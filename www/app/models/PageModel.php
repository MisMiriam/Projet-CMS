<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class PageModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        // jointure pour récupérer le nom de l'auteur de chaque page pour que je puisse afficher le Prénom et Nom des auteurs des pages dans le tableau au lieu de l'ID qui nest pas très parlant
        $sql = "SELECT p.*, u.firstname, u.lastname
        FROM pages p
        JOIN users u ON u.id_user = p.author_id
        ORDER BY p.created_at DESC";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function create(array $data)
    {
        $sql = "INSERT INTO pages (title, content, slug, status, author_id, created_at, updated_at)
            VALUES (:title, :content, :slug, :status, :author_id, NOW(), NOW())";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            "title"     => $data["title"],
            "content"   => $data["content"],
            "slug"      => $data["slug"],
            "status"    => $data["status"],
            "author_id" => $data["author_id"]
        ]);
    }

}
