<?php

require_once 'BaseController.php';
require_once '../app/services/Mailer.php';

use App\Models\UserModel;
use App\Services\Mailer;

class SigninController extends BaseController
{
    public function index()
    {
        $errors = [];

        // Si le formulaire n'est pas soumis on affiche la vue
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            return $this->render('signin');
        }

        // Vérifications MACRO comme vu en cours
        $required = ["firstname", "lastname", "email", "pwd", "pwdConfirm"];
        foreach ($required as $field) {
            if (!isset($_POST[$field]) || empty($_POST[$field])) {
                $errors[] = "Le champ $field est obligatoire";
            }
        }

        if (!empty($errors)) {
            return $this->render('signin', ["errors" => $errors]);
        }

        // Nettoyage des données comme vu en cours
        $firstname = ucwords(strtolower(trim($_POST["firstname"])));
        $lastname  = strtoupper(trim($_POST["lastname"]));
        $email     = strtolower(trim($_POST["email"]));
        $pwd       = $_POST["pwd"];
        $pwdConfirm = $_POST["pwdConfirm"];

        // Vérifications MICRO comme vu en cours
        if (strlen($firstname) < 2) {
            $errors[] = "Votre prénom doit faire au moins 2 caractères";
        }

        if (strlen($lastname) < 2) {
            $errors[] = "Votre nom doit faire au moins 2 caractères";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Votre email est incorrect";
        }

        // Vérification de l'unicité du mail via UserModel
        $userModel = new UserModel();
        if ($userModel->emailExists($email)) {
            $errors[] = "Cet email existe déjà";
        }

        // Vérification mot de passe comme vu en cours
        if (
            strlen($pwd) < 8 ||
            !preg_match("#[a-z]#", $pwd) ||
            !preg_match("#[A-Z]#", $pwd) ||
            !preg_match("#[0-9]#", $pwd) ||
            !preg_match("#[-.;?,!]#", $pwd)
        ) {
            $errors[] = "Votre mot de passe doit contenir 8 caractères dont 1 maj, 1 min, 1 chiffre et 1 caractère spécial (.;?,-!)";
        }

        if ($pwd !== $pwdConfirm) {
            $errors[] = "La confirmation du mot de passe ne correspond pas";
        }

        // Si erreurs on affiche la vue
        if (!empty($errors)) {
            return $this->render('signin', ["errors" => $errors]);
        }

        // Hash du mot de passe comme vu en cours
        $passwordHashed = password_hash($pwd, PASSWORD_DEFAULT);

        // Création de l'utilisateur
        $userId = $userModel->createUser([
            "firstname" => $firstname,
            "lastname"  => $lastname,
            "email"     => $email,
            "password"  => $passwordHashed,
            "role_id"   => 3
        ]);

        // Génération du token d’activation
        $token = bin2hex(random_bytes(32));
        $userModel->storeActivationToken($userId, $token);

        $mailer = new Mailer();
        $mailer->sendActivationEmail($email, $token);

        $success = "Inscription réussie ! Un email d’activation vous a été envoyé. 
                    Veuillez activer votre compte avant de vous connecter";

        return $this->render('signin', compact('success'));

    }
}
