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

    public function store()
    {
        requireRole(2);

        $title = $_POST['title'];
        $content = $_POST['content'];
        $status = $_POST['status'];

        // Génération automatique du slug
        function slugify($text) // fonction slugify trouvée sur internet
        {
            // Strip html tags
            $text=strip_tags($text);
            // Replace non letter or digits by -
            $text = preg_replace('~[^\pL\d]+~u', '-', $text);
            // Transliterate
            setlocale(LC_ALL, 'en_US.utf8');
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
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
            // Return result
            return $text;
        }

        $slug = slugify($title);

        $model = new PageModel();
        $model->create([
            "title" => $title,
            "content" => $content,
            "slug" => $slug,
            "status" => $status,
            "author_id" => $_SESSION['user_id']
        ]);

        header("Location: /adminpages/index");
        exit;
    }


}
