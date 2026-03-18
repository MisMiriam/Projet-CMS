<?php

require_once 'BaseController.php';

class LoginController extends BaseController
{
    public function index()
    {
        $this->render('login');
    }
}
