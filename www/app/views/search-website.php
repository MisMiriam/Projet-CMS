<?php require_once 'layouts/_header.php' ?>

<h1 class="page-title">Rechercher un site web</h1>

<section class="site-section">
    <div class="search-row">
        <div class="search-row__input">
            <input type="text" class="input" id="theme" placeholder="Rechercher...">
        </div>
        <div>
            <button type="button" class="btn btn--primary"><svg class="icon" aria-hidden="true"><use xlink:href="/public/src/icons/sprite.svg#icon-eye"></use></svg></button>
        </div>
        <div>
            <button type="button" class="btn btn--ghost">Afficher les filtres</button>
        </div>
    </div>

    <div class="cards-grid">
        <?php for ($i = 0; $i < 4; $i++): ?>
        <article class="card card--search" style="max-width:400px; min-width:330px;">
            <div class="card__media">
                <img src="https://placehold.co/250x180" class="card__img" alt="image website <?= $i ?>">
                <div class="card__badges">
                    <button class="btn btn--icon" aria-label="Favori"> <svg class="icon"><use xlink:href="/public/src/icons/sprite.svg#icon-github"></use></svg></button>
                    <button class="btn btn--icon" aria-label="Favori rempli"> <svg class="icon"><use xlink:href="/public/src/icons/sprite.svg#icon-eye"></use></svg></button>
                </div>
            </div>
            <div class="card__body">
                <h3 class="card__title">Nom du site</h3>
                <p class="card__subtitle">Auteur - <small>Date</small></p>
                <p class="card__text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                <div class="card__actions">
                    <a href="#" class="btn btn--primary">Afficher</a>
                </div>
            </div>
        </article>
        <?php endfor; ?>
    </div>
</section>

<?php require_once 'layouts/_footer.php' ?>
