<h1>Créer un utilisateur</h1>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="/admin/users/store" method="post">
    <div>
        <label>Prénom</label>
        <input type="text" name="firstname" value="<?= htmlspecialchars($_POST['firstname'] ?? '') ?>" required>
    </div>
    <div>
        <label>Nom</label>
        <input type="text" name="lastname" value="<?= htmlspecialchars($_POST['lastname'] ?? '') ?>" required>
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
    </div>
    <div>
        <label>Mot de passe</label>
        <input type="password" name="password" required>
    </div>
    <div>
        <label>Rôle (1=admin,2=éditeur,3=visiteur)</label>
        <input type="number" name="role_id" min="1" max="3" value="3">
    </div>
    <div>
        <label>Actif</label>
        <input type="checkbox" name="is_active" value="1">
    </div>
    <button type="submit">Créer</button>
</form>
