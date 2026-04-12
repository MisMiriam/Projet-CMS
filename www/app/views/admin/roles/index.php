<?php require_once 'layouts/_header.php' ?>

<h1>Gestion des rôles</h1>

<a href="/admin/roles/create" class="btn btn-primary mb-3">Créer un rôle</a>

<?php if (!empty($roles)): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $role): ?>
                <tr>
                    <td><?= $role['id_role'] ?></td>
                    <td><?= htmlspecialchars($role['name']) ?></td>
                    <td>
                        <a href="/admin/roles/edit/<?= $role['id_role'] ?>" class="btn btn-sm btn-secondary">Modifier</a>
                        <a href="/admin/roles/delete/<?= $role['id_role'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce rôle ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Aucun rôle trouvé.</p>
<?php endif; ?>

<?php require_once 'layouts/_footer.php' ?>
