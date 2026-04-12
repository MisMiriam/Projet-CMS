<?php require_once 'layouts/_header.php' ?>

<h1>Modifier un rôle</h1>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="/admin/roles/update/<?= $role['id_role'] ?>" method="post">
    <div class="mb-3">
        <label class="form-label">Nom</label>
        <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($role['name'] ?? '') ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<?php require_once 'layouts/_footer.php' ?>
