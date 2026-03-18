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
            "is_active" => 0
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
}
