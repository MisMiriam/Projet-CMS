<?php require_once 'layouts/_header.php' ?>

<h1>Modifier un utilisateur</h1>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="/admin/users/update/<?= $user['id_user'] ?>" method="post">
    <div class="mb-3">
        <label class="form-label">Prénom</label>
        <input type="text" class="form-control" name="firstname" value="<?= htmlspecialchars($user['firstname'] ?? '') ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" class="form-control" name="lastname" value="<?= htmlspecialchars($user['lastname'] ?? '') ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Nouveau mot de passe (laisser vide pour conserver)</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="mb-3">
        <label class="form-label">Rôle (1=admin,2=éditeur,3=visiteur)</label>
        <input type="number" class="form-control" name="role_id" min="1" max="3" value="<?= htmlspecialchars($user['role_id'] ?? 3) ?>">
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" name="is_active" value="1" <?= (!empty($user['is_active']) ? 'checked' : '') ?> >
        <label class="form-check-label">Actif</label>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php require_once 'layouts/_footer.php' ?>
