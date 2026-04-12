<?php require_once 'layouts/_header.php' ?>

<h1>Erreur base de données</h1>

<div class="alert alert-danger">
    <p><?= htmlspecialchars($message) ?></p>
    <p>Tu peux exécuter le script SQL suivant depuis la racine du projet pour créer les tables nécessaires :</p>
    <pre><code>mysql -u &lt;user&gt; -p &lt; db &gt; &lt; <?= htmlspecialchars(__DIR__ . '/../../../sql/schema.sql') ?></code></pre>
    <p>Ou ouvrir <code>www/sql/schema.sql</code> et l'exécuter via ton client SQL.</p>
</div>

<?php require_once 'layouts/_footer.php' ?>

