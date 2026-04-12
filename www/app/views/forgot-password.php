<?php require_once 'layouts/_header.php' ?>

<h1>Mot de passe oublié</h1>

<?php if (!empty($success)): ?>
    <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
<?php endif; ?>

<form method="post" action="/forgot">
    <div class="mb-3">
        <label class="form-label">Votre adresse email</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer le lien de réinitialisation</button>
</form>

<?php require_once 'layouts/_footer.php' ?>
