<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    private function getBaseUrl(): string
    {
        // utiliser APP_URL si défini, sinon construire depuis la requête
        $env = getenv('APP_URL');
        if ($env && is_string($env) && trim($env) !== '') {
            return rtrim($env, '/');
        }

        if (!empty($_SERVER['HTTP_HOST'])) {
            $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
            return $scheme . '://' . $_SERVER['HTTP_HOST'];
        }

        return 'http://localhost';
    }

    // Récupère la config SMTP depuis les variables d'environnement
    private function getSmtpConfig(): array
    {
        $host = getenv('SMTP_HOST') ?: 'smtp.gmail.com';
        $username = getenv('SMTP_USERNAME') ?: '';
        $password = getenv('SMTP_PASSWORD') ?: '';
        $port = (int)(getenv('SMTP_PORT') ?: 587);
        $secure = getenv('SMTP_SECURE') ?: 'tls'; // 'ssl' or 'tls'
        $fromEmail = getenv('MAIL_FROM') ?: ($username ?: 'no-reply@example.com');
        $fromName = getenv('MAIL_FROM_NAME') ?: 'CMS';

        return [
            'host' => $host,
            'username' => $username,
            'password' => $password,
            'port' => $port,
            'secure' => $secure,
            'from_email' => $fromEmail,
            'from_name' => $fromName,
        ];
    }

    private function applySmtpConfig(PHPMailer $mail, array $cfg): void
    {
        $mail->isSMTP();
        $mail->Host = $cfg['host'];

        // activer l'authentification seulement si credentials fournis
        if (!empty($cfg['username'])) {
            $mail->SMTPAuth = true;
            $mail->Username = $cfg['username'];
            $mail->Password = $cfg['password'];
        } else {
            $mail->SMTPAuth = false;
        }

        // choisir le chiffrement
        $secure = strtolower($cfg['secure']);
        if ($secure === 'ssl' || $secure === 'smtps') {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        } else {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        }

        $mail->Port = $cfg['port'];
        $mail->setFrom($cfg['from_email'], $cfg['from_name']);
    }

    public function sendActivationEmail(string $to, string $token): bool
    {
        $mail = new PHPMailer(true);

        try {
            $cfg = $this->getSmtpConfig();
            $this->applySmtpConfig($mail, $cfg);

            $mail->addAddress($to);

            $mail->isHTML(true);
            $mail->Subject = 'Activation de votre compte';

            $base = $this->getBaseUrl();
            $activationLink = $base . '/activation/index?token=' . urlencode($token);

            $mail->Body = "
                <h2>Bienvenue !</h2>
                <p>Merci pour votre inscription.</p>
                <p>Cliquez sur le lien ci-dessous pour activer votre compte :</p>
                <p><a href=\"{$activationLink}\">{$activationLink}</a></p>
            ";

            $mail->AltBody = "Bienvenue !\n\nMerci pour votre inscription.\n\nCopiez/collez ce lien dans votre navigateur pour activer votre compte : {$activationLink}";

            return $mail->send();
        } catch (Exception $e) {
            return false;
        }
    }

    public function sendResetEmail(string $to, string $token): bool
    {
        $mail = new PHPMailer(true);

        try {
            $cfg = $this->getSmtpConfig();
            $this->applySmtpConfig($mail, $cfg);

            $mail->addAddress($to);

            $mail->isHTML(true);
            $mail->Subject = 'Réinitialisation de votre mot de passe';

            $base = $this->getBaseUrl();
            $resetLink = $base . '/reset/index?token=' . urlencode($token);

            $mail->Body = "
                <h2>Réinitialisation du mot de passe</h2>
                <p>Vous avez demandé la réinitialisation de votre mot de passe.</p>
                <p>Cliquez sur le lien ci-dessous pour définir un nouveau mot de passe :</p>
                <p><a href=\"{$resetLink}\">{$resetLink}</a></p>
                <p>Si vous n'avez pas demandé cette action, ignorez cet email.</p>
            ";

            $mail->AltBody = "Réinitialisation du mot de passe\n\nVous avez demandé la réinitialisation de votre mot de passe. Copiez/collez ce lien dans votre navigateur pour définir un nouveau mot de passe : {$resetLink}";

            return $mail->send();
        } catch (Exception $e) {
            return false;
        }
    }
}
