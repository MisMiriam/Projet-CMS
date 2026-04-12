<h1>Gestion des pages</h1>

<a href="/admin/pages/create">Créer une nouvelle page</a>

<table>
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Slug</th>
        <th>Status</th>
        <th>Auteur</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($pages as $page): ?>
        <tr>
            <td><?= $page['id_page'] ?></td>
            <td><?= $page['title'] ?></td>
            <td><?= $page['slug'] ?></td>
            <td><?= $page['status'] ?></td>
            <td><?= $page['firstname'] . ' ' . $page['lastname'] ?></td>
            <td>
                <a href="/admin/pages/edit/<?= $page['id_page'] ?>">Modifier</a>
                <a href="/admin/pages/delete/<?= $page['id_page'] ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
