<?php require_once 'layouts/_header.php' ?>

<h1>Créer une page</h1>

<form action="/admin/pages/store" method="post" class="form">
    <div class="form__group">
        <label for="title">Titre</label>
        <input id="title" type="text" name="title" class="input" required>
    </div>

    <div class="form__group">
        <label for="content">Contenu</label>
        <textarea id="content" name="content" class="input" required></textarea>
    </div>

    <div class="form__group">
        <label for="status">Status</label>
        <select id="status" name="status" class="select">
            <option value="draft">Brouillon</option>
            <option value="published">Publié</option>
        </select>
    </div>

    <button type="submit" class="btn btn--primary">Créer</button>
</form>

<?php require_once 'layouts/_footer.php' ?>
