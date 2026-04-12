<?php require_once 'layouts/_header.php' ?>

<h1>Modifier une page</h1>

<form action="/admin/pages/update/<?= $page['id_page'] ?>" method="post" class="form">
    <div class="form__group">
        <label for="title">Titre</label>
        <input id="title" type="text" name="title" class="input" value="<?= htmlspecialchars($page['title']) ?>" required>
    </div>

    <div class="form__group">
        <label for="content">Contenu</label>
        <textarea id="content" name="content" class="input" required><?= htmlspecialchars($page['content']) ?></textarea>
    </div>

    <div class="form__group">
        <label for="status">Status</label>
        <select id="status" name="status" class="select">
            <option value="draft" <?= ($page['status'] === 'draft') ? 'selected' : '' ?>>Brouillon</option>
            <option value="published" <?= ($page['status'] === 'published') ? 'selected' : '' ?>>Publié</option>
        </select>
    </div>

    <button type="submit" class="btn btn--primary">Enregistrer</button>
</form>

<?php require_once 'layouts/_footer.php' ?>
