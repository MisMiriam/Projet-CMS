<?php

require_once 'BaseController.php';
require_once '../app/core/auth.php';

class SearchWebsiteController extends BaseController
{
    public function index()
    {
        requireRole(2); // Les visiteurs n'ont pas accès
        $this->render('search-website');
    }
}
