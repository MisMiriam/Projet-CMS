<?php require_once 'layouts/_header.php' ?>

<h1>Réinitialiser le mot de passe</h1>

<?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
<?php endif; ?>

<form method="post" action="/reset">
    <input type="hidden" name="token" value="<?= htmlspecialchars($token ?? '') ?>">

    <div class="mb-3">
        <label class="form-label">Nouveau mot de passe</label>
        <input type="password" class="form-control" name="password" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Confirmer le mot de passe</label>
        <input type="password" class="form-control" name="passwordConfirm" required>
    </div>

    <button type="submit" class="btn btn-primary">Réinitialiser</button>
</form>

<?php require_once 'layouts/_footer.php' ?>
