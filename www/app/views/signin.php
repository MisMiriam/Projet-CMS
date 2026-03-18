<?php require_once 'layouts/_header.php' ?>
<h1 class="text-center my-3 my-lg-5 fw-bold">Inscription</h1>

<?php if (!empty($success)): ?>
    <div class="alert alert-success text-center">
        <?= $success ?>
        <a href="/login" class="fw-bold">ici</a>.
    </div>
<?php endif; ?>


<section class="d-flex flex-column row-gap-3 my-2">

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form class="container" style="max-width: 75%;" method="POST" action="/signin">

        <div class="mb-3">
            <label for="lastname" class="form-label">Nom :</label>
            <input type="text" class="form-control" id="lastname" name="lastname"
                   value="<?= $_POST['lastname'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label for="firstname" class="form-label">Prénom :</label>
            <input type="text" class="form-control" id="firstname" name="firstname"
                   value="<?= $_POST['firstname'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" class="form-control" id="email" name="email"
                   placeholder="nom.prenom@example.com"
                   value="<?= $_POST['email'] ?? '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="pwd" class="form-label">Mot de passe :</label>
            <input type="password" class="form-control" id="pwd" name="pwd" required>
        </div>

        <div class="mb-3">
            <label for="pwdConfirm" class="form-label">Confirmer le mot de passe :</label>
            <input type="password" class="form-control" id="pwdConfirm" name="pwdConfirm" required>
        </div>

        <button type="submit" class="btn btn-primary mb-3">S'inscrire</button>

        <p class="form-text text-end">
            Si vous avez déjà un compte,
            <a class="link-primary" href="/login">Connectez-vous</a>
        </p>

    </form>
</section>

<?php require_once 'layouts/_footer.php' ?>
