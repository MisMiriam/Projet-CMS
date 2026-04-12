<?php

require_once 'BaseController.php';

class LogoutController extends BaseController
{
    public function index()
    {
        // destruction de la session sans produire de notice
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Supprimer toutes les variables de session
        $_SESSION = [];

        // Si on veut détruire le cookie de session
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params['path'], $params['domain'],
                $params['secure'], $params['httponly']
            );
        }

        session_unset();
        session_destroy();

        // Redirection vers la page de connexion
        header("Location: /login");
        exit;
    }
}
