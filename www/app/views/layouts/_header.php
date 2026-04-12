<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$loggedIn = isset($_SESSION['user_id']);
$roleId = $_SESSION['role_id'] ?? null;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS du projet -->
    <link rel="stylesheet" href="/css/styles.css">

    <!-- Police : Nunito -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">

    <title>Projet CMS</title>
</head>

<body>
    <header class="site-header">
        <div class="site-header__inner container">
            <a href="/" class="site-header__brand">Projet CMS</a>

            <nav class="site-nav" aria-label="Navigation principale">
                <ul class="site-nav__list">
                    <li class="site-nav__item"><a class="site-nav__link" href="/">Accueil</a></li>

                    <?php if ($loggedIn && $roleId == 2): ?>
                        <li class="site-nav__item"><a class="site-nav__link" href="/admin/pages">Gérer les pages</a></li>
                    <?php endif; ?>

                    <?php if ($loggedIn && $roleId == 1): ?>
                        <li class="site-nav__item"><a class="site-nav__link" href="/admin/dashboard">Tableau de bord</a></li>
                    <?php endif; ?>
                </ul>
            </nav>

            <div class="site-header__actions">
                <?php if (!$loggedIn): ?>
                    <a class="site-header__link" href="/login">Se connecter</a>
                    <a class="site-header__link" href="/signin">S'inscrire</a>
                <?php else: ?>
                    <span class="site-header__user">Bonjour, <?= htmlspecialchars($_SESSION['firstname'] ?? '') ?></span>
                    <a class="site-header__link" href="/logout">Se déconnecter</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <main class="container my-4">