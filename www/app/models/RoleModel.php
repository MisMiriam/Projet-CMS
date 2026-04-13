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

        // Table et colonnes connues : utiliser la table 'role' fournie par l'utilisateur
        $this->table = 'role';
        $this->idCol = 'id_role';
        $this->nameCol = 'name';
        $this->descCol = null; // la table ne contient pas de colonne 'description' selon la DB fournie
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
