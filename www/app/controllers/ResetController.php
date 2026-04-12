<?php

require_once 'BaseController.php';
require_once '../app/models/UserModel.php';

use App\Models\UserModel;

class ResetController extends BaseController
{
    public function index()
    {
        $token = $_GET['token'] ?? null;

        // GET : afficher le formulaire si token
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $this->render('reset-password', ['token' => $token]);
        }

        // POST : traiter le reset
        $token = $_POST['token'] ?? null;
        $password = $_POST['password'] ?? '';
        $passwordConfirm = $_POST['passwordConfirm'] ?? '';

        if (!$token) {
            $error = 'Token manquant.';
            return $this->render('reset-password', ['error' => $error]);
        }

        if ($password !== $passwordConfirm) {
            $error = 'La confirmation du mot de passe ne correspond pas.';
            return $this->render('reset-password', ['error' => $error, 'token' => $token]);
        }

        if (strlen($password) < 8) {
            $error = 'Le mot de passe doit contenir au moins 8 caractères.';
            return $this->render('reset-password', ['error' => $error, 'token' => $token]);
        }

        $model = new UserModel();
        $userId = $model->findUserIdByResetToken($token);

        if (!$userId) {
            $error = 'Token invalide ou expiré.';
            return $this->render('reset-password', ['error' => $error]);
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $model->updatePassword((int)$userId, $hash);
        $model->deleteResetToken((int)$userId);

        $success = 'Mot de passe réinitialisé. Vous pouvez maintenant vous connecter.';
        return $this->render('reset-password', ['success' => $success]);
    }
}
