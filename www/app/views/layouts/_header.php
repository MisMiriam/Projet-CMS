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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Projet CMS</title>
</head>

<body class="position-relative d-flex flex-column">
    <header>
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <a href="/" class="navbar-brand">Projet CMS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="#navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-lg-flex justify-content-lg-between" id="navbarNav">
                    <div class="navbar-nav">
                        <a class="nav-link" href="/">Accueil</a>

                        <?php if ($loggedIn && $roleId == 2): ?>
                            <!-- Éditeur : accès gestion des pages -->
                            <a class="nav-link" href="/admin/pages">Gérer les pages</a>
                        <?php endif; ?>

                        <?php if ($loggedIn && $roleId == 1): ?>
                            <!-- Admin : Dashboard -->
                            <a class="nav-link" href="/admin/dashboard">Tableau de bord</a>
                        <?php endif; ?>

                    </div>

                    <div class="navbar-nav">
                        <?php if (!$loggedIn): ?>
                            <a class="nav-link" href="/login">Se connecter</a>
                            <a class="nav-link" href="/signin">S'inscrire</a>
                        <?php else: ?>
                            <span class="navbar-text text-white me-2">Bonjour, <?= htmlspecialchars($_SESSION['firstname'] ?? '') ?></span>
                            <a class="nav-link" href="/logout">Se déconnecter</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="container my-4">