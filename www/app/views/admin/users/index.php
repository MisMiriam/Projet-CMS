<?php require_once 'layouts/_header.php' ?>

<h1>Gestion des utilisateurs</h1>

<a href="/admin/users/create" class="btn btn-primary mb-3">Créer un utilisateur</a>

<?php if (!empty($users)): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Actif</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id_user'] ?></td>
                    <td><?= htmlspecialchars($user['firstname']) ?></td>
                    <td><?= htmlspecialchars($user['lastname']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['role_id']) ?></td>
                    <td><?= $user['is_active'] ? 'Oui' : 'Non' ?></td>
                    <td>
                        <a href="/admin/users/edit/<?= $user['id_user'] ?>" class="btn btn-sm btn-secondary">Modifier</a>
                        <a href="/admin/users/delete/<?= $user['id_user'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucun utilisateur trouvé.</p>
<?php endif; ?>

<?php require_once 'layouts/_footer.php' ?>
