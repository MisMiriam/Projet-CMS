<?php

require_once 'BaseController.php';
require_once '../app/core/auth.php';

use App\Models\PageModel;

class AdminPagesController extends BaseController
{
    public function index()
    {
        requireRole(2); // les admin ET les éditeurs ont accès à cette page

        $model = new PageModel();
        $pages = $model->getAll();

        return $this->render('admin/pages/index', [
            "pages" => $pages
        ]);
    }

    public function create()
    {
        requireRole(2);

        return $this->render('admin/pages/create');
    }

    private function slugify(string $text): string
    {
        // Strip html tags
        $text = strip_tags($text);
        // Replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // Transliterate
        setlocale(LC_ALL, 'en_US.utf8');
        $text = @iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // Remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // Trim
        $text = trim($text, '-');
        // Remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // Lowercase
        $text = strtolower($text);
        // Check if it is empty
        if (empty($text)) { return 'n-a'; }
        return $text;
    }

    public function store()
    {
        requireRole(2);

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo "Méthode non autorisée";
            return;
        }

        $title = $_POST['title'] ?? null;
        $content = $_POST['content'] ?? null;
        $status = $_POST['status'] ?? 'draft';

        $errors = [];
        if (empty($title)) $errors[] = 'Le titre est obligatoire.';
        if (empty($content)) $errors[] = 'Le contenu est obligatoire.';
        if (!in_array($status, ['draft', 'published'])) $errors[] = 'Statut invalide.';

        if (!empty($errors)) {
            return $this->render('admin/pages/create', ['errors' => $errors, 'old' => ['title' => $title, 'content' => $content, 'status' => $status]]);
        }

        $slug = $this->slugify($title);

        $model = new PageModel();
        $model->create([
            "title" => $title,
            "content" => $content,
            "slug" => $slug,
            "status" => $status,
            "author_id" => $_SESSION['user_id']
        ]);

        header("Location: /admin/pages/index");
        exit;
    }

    public function edit($id)
    {
        requireRole(2);

        $model = new PageModel();
        $page = $model->findById((int)$id);

        if (!$page) {
            http_response_code(404);
            echo "404 - Page non trouvée";
            return;
        }

        return $this->render('admin/pages/edit', ['page' => $page]);
    }

    public function update($id)
    {
        requireRole(2);

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo "Méthode non autorisée";
            return;
        }

        $title = $_POST['title'] ?? null;
        $content = $_POST['content'] ?? null;
        $status = $_POST['status'] ?? 'draft';

        $errors = [];
        if (empty($title)) $errors[] = 'Le titre est obligatoire.';
        if (empty($content)) $errors[] = 'Le contenu est obligatoire.';
        if (!in_array($status, ['draft', 'published'])) $errors[] = 'Statut invalide.';

        if (!empty($errors)) {
            // Passer les données entrées pour ré-affichage
            return $this->render('admin/pages/edit', ['errors' => $errors, 'page' => ['id_page' => $id, 'title' => $title, 'content' => $content, 'status' => $status]]);
        }

        $slug = $this->slugify($title);

        $model = new PageModel();
        $model->update((int)$id, [
            'title' => $title,
            'content' => $content,
            'slug' => $slug,
            'status' => $status
        ]);

        header('Location: /admin/pages/index');
        exit;
    }

    public function delete($id)
    {
        requireRole(2);

        $model = new PageModel();
        $model->delete((int)$id);

        header('Location: /admin/pages/index');
        exit;
    }

    public function toggle($id)
    {
        requireRole(2);

        $model = new PageModel();
        $model->toggleStatus((int)$id);

        header('Location: /admin/pages/index');
        exit;
    }

}
