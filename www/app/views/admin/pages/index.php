<?php require_once 'layouts/_header.php' ?>

<h1>Gestion des pages</h1>

<a href="/admin/pages/create" class="btn btn--primary mb-3">Créer une nouvelle page</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Auteur</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pages as $page): ?>
            <tr>
                <td><?= $page['id_page'] ?></td>
                <td><?= $page['title'] ?></td>
                <td><?= $page['slug'] ?></td>
                <td><?= $page['status'] ?></td>
                <td><?= $page['firstname'] . ' ' . $page['lastname'] ?></td>
                <td>
                    <a href="/admin/pages/edit/<?= $page['id_page'] ?>" class="btn btn--small btn--secondary">Modifier</a>
                    <a href="/admin/pages/delete/<?= $page['id_page'] ?>" class="btn btn--small btn--danger" data-confirm="Supprimer cette page ?">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php if (!empty($pagination) && $pagination['totalPages'] > 1): ?>
    <?php $current = (int)$pagination['current']; $total = (int)$pagination['totalPages']; ?>
    <nav class="pagination" aria-label="Pagination des pages">
        <?php if ($current > 1): ?>
            <a class="pagination__link" href="?page=<?= $current - 1 ?>">&laquo; Préc</a>
        <?php else: ?>
            <span class="pagination__link is-disabled">&laquo; Préc</span>
        <?php endif; ?>

        <?php for ($p = 1; $p <= $total; $p++): ?>
            <?php if ($p == $current): ?>
                <span class="pagination__link is-current"><?= $p ?></span>
            <?php else: ?>
                <a class="pagination__link" href="?page=<?= $p ?>"><?= $p ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($current < $total): ?>
            <a class="pagination__link" href="?page=<?= $current + 1 ?>">Suiv &raquo;</a>
        <?php else: ?>
            <span class="pagination__link is-disabled">Suiv &raquo;</span>
        <?php endif; ?>
    </nav>
<?php endif; ?>

<?php require_once 'layouts/_footer.php' ?>
