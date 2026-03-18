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

            $activationLink = "http://localhost/activation/index?token=" . $token;

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
}
