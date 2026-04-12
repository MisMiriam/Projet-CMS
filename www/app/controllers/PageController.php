<?php

require_once 'BaseController.php';
require_once '../app/models/PageModel.php';

use App\Models\PageModel;

class PageController extends BaseController
{
    public function show($slug = null)
    {
        if (!$slug) {
            http_response_code(404);
            echo "404 - Page non trouvée";
            return;
        }

        $model = new PageModel();
        $page = $model->findBySlug($slug);

        if (!$page) {
            http_response_code(404);
            echo "404 - Page non trouvée";
            return;
        }

        // Vérification du statut
        if (($page['status'] ?? '') !== 'published') {
            http_response_code(403);
            // Afficher la vue forbidden si la page n'est pas publiée
            return $this->render('forbidden');
        }

        // Rendu de la vue 'page' en passant la page
        return $this->render('page', ['page' => $page]);
    }
}
