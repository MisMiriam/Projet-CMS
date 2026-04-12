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

        // affichage du formulaire si GET
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            return $this->render('signin');
        }

        // champs requis
        $required = ["firstname", "lastname", "email", "pwd", "pwdConfirm"];
        foreach ($required as $field) {
            if (!isset($_POST[$field]) || empty($_POST[$field])) {
                $errors[] = "Le champ $field est obligatoire";
            }
        }

        if (!empty($errors)) {
            return $this->render('signin', ["errors" => $errors]);
        }

        // nettoyage
        $firstname = ucwords(strtolower(trim($_POST["firstname"])));
        $lastname  = strtoupper(trim($_POST["lastname"]));
        $email     = strtolower(trim($_POST["email"]));
        $pwd       = $_POST["pwd"];
        $pwdConfirm = $_POST["pwdConfirm"];

        // validations
        if (strlen($firstname) < 2) {
            $errors[] = "Votre prénom doit faire au moins 2 caractères";
        }

        if (strlen($lastname) < 2) {
            $errors[] = "Votre nom doit faire au moins 2 caractères";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Votre email est incorrect";
        }

        // unicité email
        $userModel = new UserModel();
        if ($userModel->emailExists($email)) {
            $errors[] = "Cet email existe déjà";
        }

        // vérification mot de passe
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

        if (!empty($errors)) {
            return $this->render('signin', ["errors" => $errors]);
        }

        // hash et création
        $passwordHashed = password_hash($pwd, PASSWORD_DEFAULT);

        $userId = $userModel->createUser([
            "firstname" => $firstname,
            "lastname"  => $lastname,
            "email"     => $email,
            "password"  => $passwordHashed,
            "role_id"   => 3
        ]);

        // token activation
        $token = bin2hex(random_bytes(32));
        $userModel->storeActivationToken($userId, $token);

        $mailer = new Mailer();
        $mailer->sendActivationEmail($email, $token);

        $success = "Inscription réussie ! Un email d’activation vous a été envoyé. 
                    Veuillez activer votre compte avant de vous connecter";

        return $this->render('signin', compact('success'));

    }
}
