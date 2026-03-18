<?php

require_once 'BaseController.php';

class SearchWebsiteController extends BaseController
{
    public function index()
    {
        $this->render('search-website');
    }
}
