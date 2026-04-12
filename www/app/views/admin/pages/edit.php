<h1>Modifier une page</h1>

<form action="/admin/pages/update/<?= $page['id_page'] ?>" method="post">
    <div>
        <label>Titre</label>
        <input type="text" name="title" value="<?= htmlspecialchars($page['title']) ?>" required>
    </div>

    <div>
        <label>Contenu</label>
        <textarea name="content" required><?= htmlspecialchars($page['content']) ?></textarea>
    </div>

    <div>
        <label>Status</label>
        <select name="status">
            <option value="draft" <?= ($page['status'] === 'draft') ? 'selected' : '' ?>>Brouillon</option>
            <option value="published" <?= ($page['status'] === 'published') ? 'selected' : '' ?>>Publié</option>
        </select>
    </div>

    <button type="submit">Enregistrer</button>
</form>
