<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    public function sendActivationEmail(string $to, string $token): bool
    {
        $mail = new PHPMailer(true);

        try {
            // Config SMTP (exemple Gmail)
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'pauline.entesok@gmail.com';
            $mail->Password = 'rnvzvawjkizrbquz';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Expéditeur
            $mail->setFrom('pauline.entesok@gmail.com', 'CMS');

            // Destinataire
            $mail->addAddress($to);

            // Contenu
            $mail->isHTML(true);
            $mail->Subject = 'Activation de votre compte';

            // Utiliser lien relatif pour l'activation afin d'éviter une URL hardcodée
            $activationLink = "/activation/index?token=" . $token;

            $mail->Body = "
                <h2>Bienvenue !</h2>
                <p>Merci pour votre inscription.</p>
                <p>Cliquez sur le lien ci-dessous pour activer votre compte :</p>
                <a href='$activationLink'>$activationLink</a>
            ";

            return $mail->send();
        } catch (Exception $e) {
            return false;
        }
    }

    public function sendResetEmail(string $to, string $token): bool
    {
        $mail = new PHPMailer(true);

        try {
            // Config SMTP (utiliser la même configuration)
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'pauline.entesok@gmail.com';
            $mail->Password = 'rnvzvawjkizrbquz';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('pauline.entesok@gmail.com', 'CMS');
            $mail->addAddress($to);

            $mail->isHTML(true);
            $mail->Subject = 'Réinitialisation de votre mot de passe';

            $resetLink = "/reset/index?token=" . $token;

            $mail->Body = "
                <h2>Réinitialisation du mot de passe</h2>
                <p>Vous avez demandé la réinitialisation de votre mot de passe.</p>
                <p>Cliquez sur le lien ci-dessous pour définir un nouveau mot de passe :</p>
                <a href='$resetLink'>$resetLink</a>
                <p>Si vous n'avez pas demandé cette action, ignorez cet email.</p>
            ";

            return $mail->send();
        } catch (Exception $e) {
            return false;
        }
    }
}
