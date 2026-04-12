<?php require_once 'layouts/_header.php' ?>

<h1 class="page-title">Accueil</h1>

<p>Bienvenue sur notre site.</p>

<?php if (!empty($pages)): ?>
    <h2>Pages publiées</h2>
    <ul class="list list--card">
        <?php foreach ($pages as $p): ?>
            <li>
                <a href="/page/<?= htmlspecialchars($p['slug']) ?>">
                    <span class="card__title"><?= htmlspecialchars($p['title']) ?></span>
                    <span class="card__meta">Par <?= htmlspecialchars(trim(($p['firstname'] ?? '') . ' ' . ($p['lastname'] ?? ''))) ?> - Publié le <?= htmlspecialchars(isset($p['created_at']) ? date('d/m/Y', strtotime($p['created_at'])) : '') ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php require_once 'layouts/_footer.php' ?>