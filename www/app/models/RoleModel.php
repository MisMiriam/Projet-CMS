<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class RoleModel
{
    private PDO $db;
    private string $table;
    private string $idCol;
    private string $nameCol;
    private ?string $descCol = null;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();

        // Déterminer le nom de la table (supporte 'roles' ou 'role')
        $table = null;
        $stmt = $this->db->query("SHOW TABLES LIKE 'roles'");
        if ($stmt && $stmt->fetch()) {
            $table = 'roles';
        } else {
            $stmt = $this->db->query("SHOW TABLES LIKE 'role'");
            if ($stmt && $stmt->fetch()) {
                $table = 'role';
            }
        }

        if (!$table) {
            // garder 'roles' par défaut : les méthodes feront échouer proprement si table absente
            $table = 'roles';
        }

        $this->table = $table;

        // Tenter de détecter les colonnes id/name/description
        try {
            $colsStmt = $this->db->query("SHOW COLUMNS FROM `{$this->table}`");
            $cols = $colsStmt ? $colsStmt->fetchAll(PDO::FETCH_ASSOC) : [];

            // Par défaut
            $this->idCol = 'id_role';
            $this->nameCol = 'name';
            $this->descCol = 'description';

            // Best-effort mapping selon les colonnes réelles
            $colNames = array_column($cols, 'Field');

            // id candidate: look for 'id_role', 'id', or ending with '_id'
            foreach ($colNames as $c) {
                if ($c === 'id_role' || $c === 'id') { $this->idCol = $c; break; }
            }
            if ($this->idCol === 'id_role') {
                foreach ($colNames as $c) {
                    if (preg_match('/_id$/', $c) && $c !== 'role_id') { $this->idCol = $c; break; }
                }
            }

            // name candidate: prefer 'name', then 'role', then 'label'
            if (in_array('name', $colNames)) {
                $this->nameCol = 'name';
            } else if (in_array('role', $colNames)) {
                $this->nameCol = 'role';
            } else if (in_array('label', $colNames)) {
                $this->nameCol = 'label';
            } else if (!empty($colNames[1])) {
                // fallback to second column if available
                $this->nameCol = $colNames[1];
            }

            // description candidate
            if (in_array('description', $colNames)) {
                $this->descCol = 'description';
            } else {
                $this->descCol = null;
            }
        } catch (\Exception $e) {
            // si SHOW COLUMNS échoue, garder les valeurs par défaut
            $this->idCol = 'id_role';
            $this->nameCol = 'name';
            $this->descCol = 'description';
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `{$this->idCol}` as id_role, `{$this->nameCol}` as name";
        if ($this->descCol) $sql .= ", `{$this->descCol}` as description";
        $sql .= " FROM `{$this->table}` ORDER BY `{$this->idCol}`";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?array
    {
        $cols = "`{$this->idCol}` as id_role, `{$this->nameCol}` as name";
        if ($this->descCol) $cols .= ", `{$this->descCol}` as description";

        $sql = "SELECT {$cols} FROM `{$this->table}` WHERE `{$this->idCol}` = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    public function create(array $data): int
    {
        $sql = "INSERT INTO `{$this->table}` (`{$this->nameCol}`";
        if ($this->descCol) $sql .= ", `{$this->descCol}`";
        $sql .= ") VALUES (:name";
        if ($this->descCol) $sql .= ", :description";
        $sql .= ")";

        $stmt = $this->db->prepare($sql);
        $params = ['name' => $data['name'], 'description' => $data['description'] ?? ''];
        $stmt->execute($params);
        return (int)$this->db->lastInsertId();
    }

    public function update(int $id, array $data): void
    {
        $sql = "UPDATE `{$this->table}` SET `{$this->nameCol}` = :name";
        if ($this->descCol) $sql .= ", `{$this->descCol}` = :description";
        $sql .= " WHERE `{$this->idCol}` = :id";

        $stmt = $this->db->prepare($sql);
        $params = ['name' => $data['name'], 'description' => $data['description'] ?? '', 'id' => $id];
        $stmt->execute($params);
    }

    public function delete(int $id): void
    {
        $sql = "DELETE FROM `{$this->table}` WHERE `{$this->idCol}` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    // Ajout de getters utilitaires
    public function getTableName(): string
    {
        return $this->table;
    }

    public function getIdColumn(): string
    {
        return $this->idCol;
    }

    public function getNameColumn(): string
    {
        return $this->nameCol;
    }

    public function hasDescriptionColumn(): bool
    {
        return !empty($this->descCol);
    }

    public function getDescriptionColumn(): ?string
    {
        return $this->descCol;
    }
}
