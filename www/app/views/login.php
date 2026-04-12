<?php require_once 'layouts/_header.php' ?>

<h1 class="page-title">Connexion</h1>

<section class="site-section">

    <?php if (!empty($error)): ?>
        <div class="alert alert--danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form class="form" style="max-width:720px;" method="POST" action="/login/index">
        <div class="form__group">
            <label for="email" class="form__label">Email :</label>
            <input type="email" class="input" id="email" name="email" required placeholder="nom.prenom@example.com">
        </div>

        <div class="form__group">
            <label for="pwd" class="form__label">Mot de passe :</label>
            <input type="password" class="input" id="pwd" name="password" required>
        </div>

        <button type="submit" class="btn btn--primary">Se connecter</button>

        <p class="form__hint">
            Pas de compte ? <a class="link" href="/signin/index">Inscrivez-vous</a>
        </p>

        <p class="form__hint">
            <a class="link" href="/forgot">Mot de passe oublié ?</a>
        </p>
    </form>
</section>

<?php require_once 'layouts/_footer.php' ?>
