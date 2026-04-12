<?php require_once 'layouts/_header.php' ?>

<article class="container my-4">
    <h1><?= htmlspecialchars($page['title'] ?? 'Sans titre') ?></h1>
    <p class="meta">Par <?= htmlspecialchars(($page['firstname'] ?? '') . ' ' . ($page['lastname'] ?? '')) ?> - Publié le <?= htmlspecialchars($page['created_at'] ?? '') ?></p>

    <div class="content">
        <?= $page['content'] ?? '' ?>
    </div>

    <p class="mt-4"><a href="/" class="btn btn--secondary">Retour à l'accueil</a></p>
</article>

<?php require_once 'layouts/_footer.php' ?>
