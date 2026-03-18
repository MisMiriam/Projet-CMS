<?php require_once 'layouts/_header.php' ?>

<h1 class="text-center my-3 my-lg-5 fw-bold">Connexion</h1>

<section class="d-flex flex-column row-gap-3 my-2">

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form class="container" style="max-width: 75%;" method="POST" action="/login/index">
        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="nom.prenom@example.com">
        </div>

        <div class="mb-3">
            <label for="pwd" class="form-label">Mot de passe :</label>
            <input type="password" class="form-control" id="pwd" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary mb-3">Se connecter</button>

        <p class="form-text text-end">
            Pas de compte ? <a class="link-primary" href="/signin/index">Inscrivez-vous</a>
        </p>
    </form>
</section>

<?php require_once 'layouts/_footer.php' ?>
