<?php

require_once 'BaseController.php';
require_once '../app/models/PageModel.php';

use App\Models\PageModel;

class HomeController extends BaseController {
    public function index() {
        $model = new PageModel();
        $pages = $model->getPublished();
        $this->render('home', ['pages' => $pages]);
    }
}
