<?php require_once 'layouts/_header.php' ?>

<h1 class="page-title">Mot de passe oublié</h1>

<?php if (!empty($success)): ?>
    <div class="alert alert--success"><?= htmlspecialchars($success) ?></div>
<?php endif; ?>

<form class="form" method="post" action="/forgot">
    <div class="form__group">
        <label class="form__label">Votre adresse email</label>
        <input type="email" class="input" name="email" required>
    </div>
    <button type="submit" class="btn btn--primary">Envoyer le lien de réinitialisation</button>
</form>

<?php require_once 'layouts/_footer.php' ?>
