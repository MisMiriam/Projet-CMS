<?php require_once 'layouts/_header.php' ?>

<main class="container">
    <h1>Modifier un utilisateur</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert--danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form class="form" action="/admin/users/update/<?= $user['id_user'] ?>" method="post">
        <div class="form__group">
            <label class="form__label">Prénom</label>
            <input type="text" class="input" name="firstname" value="<?= htmlspecialchars($user['firstname'] ?? '') ?>" required>
        </div>
        <div class="form__group">
            <label class="form__label">Nom</label>
            <input type="text" class="input" name="lastname" value="<?= htmlspecialchars($user['lastname'] ?? '') ?>" required>
        </div>
        <div class="form__group">
            <label class="form__label">Email</label>
            <input type="email" class="input" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>
        </div>
        <div class="form__group">
            <label class="form__label">Nouveau mot de passe (laisser vide pour conserver)</label>
            <input type="password" class="input" name="password">
        </div>
        <div class="form__group">
            <label class="form__label">Rôle (1=admin,2=éditeur,3=visiteur)</label>
            <input type="number" class="input" name="role_id" min="1" max="3" value="<?= htmlspecialchars($user['role_id'] ?? 3) ?>">
        </div>
        <div class="form__group form__group--checkbox">
            <label class="checkbox-label">
                <input type="checkbox" class="checkbox" name="is_active" value="1" <?= (!empty($user['is_active']) ? 'checked' : '') ?> >
                Actif
            </label>
        </div>
        <button type="submit" class="btn btn--primary">Enregistrer</button>
    </form>
</main>

<?php require_once 'layouts/_footer.php' ?>
