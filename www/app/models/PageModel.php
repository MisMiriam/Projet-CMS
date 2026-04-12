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

    // Récupère toutes les pages (avec auteur)
    public function getAll()
    {
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

    // Récupère une page par slug
    public function findBySlug(string $slug): ?array
    {
        $sql = "SELECT p.*, u.firstname, u.lastname
                FROM pages p
                JOIN users u ON u.id_user = p.author_id
                WHERE p.slug = :slug
                LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(["slug" => $slug]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    // Récupère une page par id
    public function findById(int $id): ?array
    {
        $sql = "SELECT p.*, u.firstname, u.lastname
                FROM pages p
                JOIN users u ON u.id_user = p.author_id
                WHERE p.id_page = :id
                LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(["id" => $id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    // Met à jour une page
    public function update(int $id, array $data): void
    {
        $sql = "UPDATE pages SET title = :title, content = :content, slug = :slug, status = :status, updated_at = NOW() WHERE id_page = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            "title" => $data["title"],
            "content" => $data["content"],
            "slug" => $data["slug"],
            "status" => $data["status"],
            "id" => $id
        ]);
    }

    // Supprime une page
    public function delete(int $id): void
    {
        $sql = "DELETE FROM pages WHERE id_page = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["id" => $id]);
    }

    // Modifie le statut
    public function setStatus(int $id, string $status): void
    {
        $sql = "UPDATE pages SET status = :status, updated_at = NOW() WHERE id_page = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            "status" => $status,
            "id" => $id
        ]);
    }

    // Bascule published <-> draft
    public function toggleStatus(int $id): void
    {
        $stmt = $this->db->prepare("SELECT status FROM pages WHERE id_page = :id");
        $stmt->execute(["id" => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return;
        }
        $current = $row['status'] ?? 'draft';
        $new = ($current === 'published') ? 'draft' : 'published';
        $this->setStatus($id, $new);
    }

    // Pages publiées pour le front
    public function getPublished()
    {
        $sql = "SELECT p.*, u.firstname, u.lastname
                FROM pages p
                JOIN users u ON u.id_user = p.author_id
                WHERE p.status = 'published'
                ORDER BY p.created_at DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Nombre total de pages
    public function countAll(): int
    {
        $sql = "SELECT COUNT(*) as cnt FROM pages";
        $stmt = $this->db->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)($row['cnt'] ?? 0);
    }

    // Pages pour pagination
    public function getPaginated(int $limit, int $offset): array
    {
        $sql = "SELECT p.*, u.firstname, u.lastname
                FROM pages p
                JOIN users u ON u.id_user = p.author_id
                ORDER BY p.created_at DESC
                LIMIT :limit OFFSET :offset";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
