<?php

require_once 'BaseController.php';
require_once '../app/core/auth.php';

class SearchWebsiteController extends BaseController
{
    public function index()
    {
        requireRole(2); // accès éditeur/admin
        $this->render('search-website');
    }
}
