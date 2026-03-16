<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>CMS - Tableau de bord</title>
</head>

<body class="position-relative d-flex flex-column">
    <header>
        <navbar class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">Projet CMS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-lg-flex justify-content-lg-between" id="navbarNav">
                    <div class="navbar-nav">
                        <a class="nav-link " href="#">Accueil</a>
                        <a class="nav-link active" aria-current="page" href="#">Tableau de bord</a>
                    </div>
                    <form class="d-flex " data-bs-theme="light" role="search">
                        <input class="form-control me-2" type="search" placeholder="Rechercher un thème..." aria-label="Search" />
                        <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                    <div class="navbar-nav">
                        <a class="nav-link" href="#">Se connecter</a>
                        <a class="nav-link" href="#">S'inscrire</a>
                        <a class="nav-link" href="#">Se déconnecter</a>
                    </div>
                </div>
            </div>
        </navbar>
    </header>
    <main class="container my-4">