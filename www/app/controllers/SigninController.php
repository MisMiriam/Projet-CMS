<?php

require_once 'BaseController.php';

class SigninController extends BaseController
{
    public function index()
    {
        $this->render('signin');
    }
}
