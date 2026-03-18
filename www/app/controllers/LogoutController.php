<?php

require_once 'BaseController.php';

class LogoutController extends BaseController
{
    public function index()
    {
        // destrcution de la session
        session_start();
        session_unset();
        session_destroy();

        // Redirection vers la page de connexion
        header("Location: /login");
        exit;
    }
}
