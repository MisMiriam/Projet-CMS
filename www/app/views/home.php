<?php require_once 'layouts/_header.php' ?>

<h1 class="text-center my-3 my-lg-5 fw-bold">Accueil</h1>

<p>Bienvenue sur notre site.</p>

<?php if (!empty($pages)): ?>
    <h2>Pages publiées</h2>
    <ul>
        <?php foreach ($pages as $p): ?>
            <li><a href="/page/<?= htmlspecialchars($p['slug']) ?>"><?= htmlspecialchars($p['title']) ?></a></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php require_once 'layouts/_footer.php' ?>
