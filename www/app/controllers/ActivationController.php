<?php

require_once 'BaseController.php';
require_once '../app/models/UserModel.php';

use App\Models\UserModel;

class ActivationController extends BaseController
{
    public function index()
    {
        // Récupération du token créé dans SigninController
        $token = $_GET['token'] ?? null;

        if (!$token) {
            echo "<h2>Token manquant.</h2>";
            echo "<a href='/login'>Retour à la connexion</a>";
            return;
        }

        // Activation via UserModel
        $userModel = new UserModel();
        $success = $userModel->activateUser($token);

        // Affichage du résultat
        if ($success) {
            echo "<h2>Votre compte a été activé avec succès !</h2>";
            echo "<p>Vous pouvez maintenant vous connecter.</p>";
            echo "<a href='/login'>Se connecter</a>";
        } else {
            echo "<h2>Token invalide ou expiré.</h2>";
            echo "<a href='/login'>Retour à la connexion</a>";
        }
    }
}
