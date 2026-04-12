<?php

require_once 'BaseController.php';
require_once '../app/models/UserModel.php';
require_once '../app/services/Mailer.php';

use App\Models\UserModel;
use App\Services\Mailer;

class ForgotController extends BaseController
{
    public function index()
    {
        // GET : afficher le formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $this->render('forgot-password');
        }

        // POST : traiter l'envoi du mail
        $email = trim($_POST['email'] ?? '');

        $model = new UserModel();
        $user = $model->findByEmail($email);

        // Ne pas révéler si l'adresse existe ou non
        if ($user) {
            $token = bin2hex(random_bytes(32));
            $model->storeResetToken((int)$user['id_user'], $token);

            $mailer = new Mailer();
            $mailer->sendResetEmail($email, $token);
        }

        $success = 'Si cette adresse existe, un email de réinitialisation vous a été envoyé.';
        return $this->render('forgot-password', ['success' => $success]);
    }
}
