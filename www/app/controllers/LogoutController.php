<?php

require_once 'BaseController.php';

class LogoutController extends BaseController
{
    public function index()
    {
        // démarrage session si nécessaire
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // vider la session
        $_SESSION = [];

        // supprimer le cookie de session si utilisé
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params['path'], $params['domain'],
                $params['secure'], $params['httponly']
            );
        }

        session_unset();
        session_destroy();

        // redirect
        header("Location: /login");
        exit;
    }
}
