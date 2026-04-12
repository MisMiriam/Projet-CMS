<h1>Créer une page</h1>

<form action="/admin/pages/store" method="post">
    <label>Titre</label>
    <input type="text" name="title" required>

    <label>Contenu</label>
    <textarea name="content" required></textarea>

    <label>Status</label>
    <select name="status">
        <option value="draft">Brouillon</option>
        <option value="published">Publié</option>
    </select>

    <button type="submit">Créer</button>
</form>
