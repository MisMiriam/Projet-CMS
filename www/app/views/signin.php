<?php require_once 'layouts/_header.php' ?>

<h1 class="page-title">Inscription</h1>

<?php if (!empty($success)): ?>
    <div class="alert alert--success">
        <?= $success ?>
        <a href="/login" class="link link--bold">ici</a>.
    </div>
<?php endif; ?>


<section class="site-section">

    <?php if (!empty($errors)): ?>
        <div class="alert alert--danger">
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form class="form" style="max-width: 720px;" method="POST" action="/signin">

        <div class="form__group">
            <label for="lastname" class="form__label">Nom :</label>
            <input type="text" class="input" id="lastname" name="lastname"
                   value="<?= $_POST['lastname'] ?? '' ?>">
        </div>

        <div class="form__group">
            <label for="firstname" class="form__label">Prénom :</label>
            <input type="text" class="input" id="firstname" name="firstname"
                   value="<?= $_POST['firstname'] ?? '' ?>">
        </div>

        <div class="form__group">
            <label for="email" class="form__label">Email :</label>
            <input type="email" class="input" id="email" name="email"
                   placeholder="nom.prenom@example.com"
                   value="<?= $_POST['email'] ?? '' ?>" required>
        </div>

        <div class="form__group">
            <label for="pwd" class="form__label">Mot de passe :</label>
            <input type="password" class="input" id="pwd" name="pwd" required>
        </div>

        <div class="form__group">
            <label for="pwdConfirm" class="form__label">Confirmer le mot de passe :</label>
            <input type="password" class="input" id="pwdConfirm" name="pwdConfirm" required>
        </div>

        <button type="submit" class="btn btn--primary">S'inscrire</button>

        <p class="form__hint">
            Si vous avez déjà un compte,
            <a class="link" href="/login">Connectez-vous</a>
        </p>

    </form>
</section>

<?php require_once 'layouts/_footer.php' ?>
