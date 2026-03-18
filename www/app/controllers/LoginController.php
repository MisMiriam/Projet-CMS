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

        $_SESSION['user_id'] = $user['id_user'];
        $_SESSION['role_id'] = $user['role_id'];
        $_SESSION['firstname'] = $user['firstname'];

        // Redirection selon le rôle
        switch ($user['role_id']) {
            case 1:
                header('Location: /adminDashboard');
                break;
            case 2:
                header('Location: /admin/pages');
                break;
            default:
                header('Location: /');
        }
        exit;
    }
}
