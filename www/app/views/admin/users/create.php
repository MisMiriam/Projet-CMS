<?php require_once 'layouts/_header.php' ?>

<main class="container">
    <h1>Créer un utilisateur</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert--danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/admin/users/store" method="post" class="form">
        <div class="form__group">
            <label class="form__label">Prénom</label>
            <input type="text" name="firstname" class="input" value="<?= htmlspecialchars($_POST['firstname'] ?? '') ?>" required>
        </div>
        <div class="form__group">
            <label class="form__label">Nom</label>
            <input type="text" name="lastname" class="input" value="<?= htmlspecialchars($_POST['lastname'] ?? '') ?>" required>
        </div>
        <div class="form__group">
            <label class="form__label">Email</label>
            <input type="email" name="email" class="input" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
        </div>
        <div class="form__group">
            <label class="form__label">Mot de passe</label>
            <input type="password" name="password" class="input" required>
        </div>
        <div class="form__group">
            <label class="form__label">Rôle (1=admin,2=éditeur,3=visiteur)</label>
            <input type="number" name="role_id" class="input" min="1" max="3" value="3">
        </div>
        <div class="form__group">
            <label class="checkbox-label"><input type="checkbox" class="checkbox" name="is_active" value="1"> Actif</label>
        </div>
        <button type="submit" class="btn btn--primary">Créer</button>
    </form>
</main>

<?php require_once 'layouts/_footer.php' ?>
