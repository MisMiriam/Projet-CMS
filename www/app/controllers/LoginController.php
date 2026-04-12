<?php
use App\Models\UserModel;

require_once 'BaseController.php';
require_once '../app/models/UserModel.php';

class LoginController extends BaseController
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $this->render('login');
        }

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $userModel = new UserModel();

        // Vérification que l'utilisateur existe
        $user = $userModel->findByEmail($email);

        if (!$user) {
            $error = "Identifiants incorrects.";
            return $this->render('login', compact('error'));
        }

        // Vérification que le compte est activé
        if ((int)$user['is_active'] === 0) {
            $error = "Votre compte n'est pas encore activé. Vérifiez vos emails.";
            return $this->render('login', compact('error'));
        }

        // Vérification du mot de passe
        if (!password_verify($password, $user['password'])) {
            $error = "Identifiants incorrects.";
            return $this->render('login', compact('error'));
        }

        // Stocker les infos essentielles en session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Régénérer l'ID de session après authentification (prévenir session fixation)
        session_regenerate_id(true);

        $_SESSION['user_id'] = $user['id_user'];
        $_SESSION['role_id'] = $user['role_id'];
        $_SESSION['firstname'] = $user['firstname'];

        // Redirection vers la page d'accueil pour tous
        header('Location: /');
        exit;
    }
}
