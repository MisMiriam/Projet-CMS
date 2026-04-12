<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class UserModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /** Vérifie si un email existe déjà comme vu en cours **/
    public function emailExists(string $email): bool
    {
        $sql = "SELECT id_user FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["email" => $email]);

        return $stmt->fetch() !== false;
    }

    /** Crée un utilisateur comme vu en cours mais adapté à notre archi MVC */
    public function createUser(array $data): int
    {
        $sql = "
            INSERT INTO users (firstname, lastname, email, password, role_id, is_active, created_at)
            VALUES (:firstname, :lastname, :email, :password, :role_id, :is_active, NOW())
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            "firstname" => $data["firstname"],
            "lastname"  => $data["lastname"],
            "email"     => $data["email"],
            "password"  => $data["password"],
            "role_id"   => $data["role_id"] ?? 3,
            "is_active" => $data["is_active"] ?? 0
        ]);

        return (int) $this->db->lastInsertId();
    }

    /** Récupère un utilisateur via son email comme vu en cours */
    public function findByEmail(string $email): ?array
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["email" => $email]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    /** Stocke un token d’activation */
    public function storeActivationToken(int $userId, string $token): void
    {
        $sql = "
            INSERT INTO activation (user_id, token, created_at)
            VALUES (:user_id, :token, NOW())
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            "user_id" => $userId,
            "token"   => $token
        ]);
    }

    /** Active un utilisateur via son token */
    public function activateUser(string $token): bool
    {
        // Récupérer l'utilisateur dans la bdd
        $stmt = $this->db->prepare("SELECT user_id FROM activation WHERE token = :token");
        $stmt->execute(["token" => $token]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return false;
        }

        $userId = $row["user_id"];

        // Activer
        $stmt = $this->db->prepare("UPDATE users SET is_active = 1 WHERE id_user = :id");
        $stmt->execute(["id" => $userId]);

        // Supprimer le token
        $stmt = $this->db->prepare("DELETE FROM activation WHERE user_id = :id");
        $stmt->execute(["id" => $userId]);

        return true;
    }

    /** Récupère tous les utilisateurs (pour l'admin) */
    public function getAll(): array
    {
        $sql = "SELECT id_user, firstname, lastname, email, role_id, is_active, created_at FROM users ORDER BY created_at DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** Récupère un utilisateur par son ID */
    public function findById(int $id): ?array
    {
        $sql = "SELECT id_user, firstname, lastname, email, role_id, is_active, created_at FROM users WHERE id_user = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["id" => $id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    /** Met à jour un utilisateur (sans changer le mot de passe si non fourni) */
    public function updateUser(int $id, array $data): void
    {
        $fields = [
            'firstname' => $data['firstname'] ?? null,
            'lastname' => $data['lastname'] ?? null,
            'email' => $data['email'] ?? null,
            'role_id' => $data['role_id'] ?? null,
            'is_active' => $data['is_active'] ?? null
        ];

        $set = [];
        $params = ['id' => $id];

        foreach ($fields as $key => $val) {
            if ($val !== null) {
                $set[] = "$key = :$key";
                $params[$key] = $val;
            }
        }

        // mot de passe optionnel
        if (!empty($data['password'])) {
            $set[] = "password = :password";
            $params['password'] = $data['password'];
        }

        if (empty($set)) {
            return;
        }

        $sql = "UPDATE users SET " . implode(', ', $set) . " WHERE id_user = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
    }

    /** Supprime un utilisateur */
    public function deleteUser(int $id): void
    {
        $sql = "DELETE FROM users WHERE id_user = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    /** Stocke un token de reset de mot de passe */
    public function storeResetToken(int $userId, string $token): void
    {
        $sql = "INSERT INTO password_resets (user_id, token, created_at) VALUES (:user_id, :token, NOW())";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'user_id' => $userId,
            'token' => $token
        ]);
    }

    /** Récupère l'user_id associé à un token de reset */
    public function findUserIdByResetToken(string $token): ?int
    {
        $sql = "SELECT user_id FROM password_resets WHERE token = :token LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['token' => $token]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? (int)$row['user_id'] : null;
    }

    /** Supprime le token de reset pour un utilisateur */
    public function deleteResetToken(int $userId): void
    {
        $sql = "DELETE FROM password_resets WHERE user_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $userId]);
    }

    /** Met à jour le mot de passe d'un utilisateur (password déjà hashé) */
    public function updatePassword(int $userId, string $passwordHashed): void
    {
        $sql = "UPDATE users SET password = :password WHERE id_user = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['password' => $passwordHashed, 'id' => $userId]);
    }
}
