<?php require_once 'layouts/_header.php' ?>

<main class="container">
    <h1>Gestion des rôles</h1>

    <a href="/admin/roles/create" class="btn btn--primary mb-3">Créer un rôle</a>

    <?php if (!empty($roles)): ?>
        <table class="table">
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
                        <a href="/admin/roles/edit/<?= $role['id_role'] ?>" class="btn btn--small btn--secondary">Modifier</a>
                        <?php if ((int)$role['id_role'] === 1): ?>
                            <span class="badge--muted" title="Rôle administrateur protégé">Protégé</span>
                        <?php else: ?>
                            <a href="/admin/roles/delete/<?= $role['id_role'] ?>" class="btn btn--small btn--danger" data-confirm="Supprimer ce rôle ?">Supprimer</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun rôle trouvé.</p>
    <?php endif; ?>
</main>

<?php require_once 'layouts/_footer.php' ?>
