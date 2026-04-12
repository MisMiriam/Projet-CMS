<?php require_once 'layouts/_header.php' ?>

<main class="container">
    <h1 class="page-title">Design Guide</h1>

    <section class="site-section">
        <h2>Typographie - Font Nunito</h2>
        <h1>H1 - Titre principal</h1>
        <h2>H2 - Titre secondaire</h2>
        <h3>H3 - Titre tertiaire</h3>
        <p>Paragraphe standard. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
    </section>

    <section class="site-section">
        <h2>Formulaires</h2>
        <form style="max-width:720px;">
            <div class="form__group">
                <label for="dg-input" class="form__label">Input text</label>
                <input id="dg-input" class="input" placeholder="Example input">
            </div>
            <div class="form__group">
                <label for="dg-select" class="form__label">Select</label>
                <select id="dg-select" class="select">
                    <option>Option 1</option>
                    <option>Option 2</option>
                </select>
            </div>
            <div class="form__group">
                <label class="form__label">Checkbox</label>
                <label><input type="checkbox"> Example checkbox</label>
            </div>
        </form>
    </section>

    <section class="site-section">
        <h2>Boutons (Light / Dark)</h2>
        <div class="preview-row" style="display:flex;gap:2rem;flex-wrap:wrap;align-items:flex-start">
            <div class="preview-panel" data-theme="light" style="flex:1;min-width:280px;padding:1rem;border:1px dashed var(--border-color);border-radius:8px;">
                <h3>Light</h3>
                <div style="display:flex;gap:0.5rem;flex-wrap:wrap;align-items:center;margin-top:0.5rem">
                    <button class="btn btn--primary">Primary</button>
                    <button class="btn btn--secondary">Secondary</button>
                    <button class="btn btn--ghost">Ghost</button>
                    <button class="btn btn--danger">Danger</button>
                </div>

                <div style="display:flex;gap:0.5rem;flex-wrap:wrap;align-items:center;margin-top:0.75rem">
                    <button class="btn btn--primary btn--small">Primary small</button>
                    <button class="btn btn--secondary btn--small">Secondary small</button>
                    <button class="btn btn--ghost btn--small">Ghost small</button>
                    <button class="btn btn--danger btn--small">Danger small</button>
                </div>
            </div>

            <div class="preview-panel" data-theme="dark" style="flex:1;min-width:280px;padding:1rem;border:1px dashed var(--border-color);border-radius:8px;">
                <h3 style="color:var(--color-text)">Dark</h3>
                <div style="display:flex;gap:0.5rem;flex-wrap:wrap;align-items:center;margin-top:0.5rem">
                    <button class="btn btn--primary">Primary</button>
                    <button class="btn btn--secondary">Secondary</button>
                    <button class="btn btn--ghost">Ghost</button>
                    <button class="btn btn--danger">Danger</button>
                </div>

                <div style="display:flex;gap:0.5rem;flex-wrap:wrap;align-items:center;margin-top:0.75rem">
                    <button class="btn btn--primary btn--small">Primary small</button>
                    <button class="btn btn--secondary btn--small">Secondary small</button>
                    <button class="btn btn--ghost btn--small">Ghost small</button>
                    <button class="btn btn--danger btn--small">Danger small</button>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section">
        <h2>Cards</h2>
        <p>Exemples de cartes simples réutilisables dans l'interface.</p>

        <div style="display:flex;gap:1rem;flex-wrap:wrap;align-items:flex-start">
            <!-- Simple card -->
            <div class="card" style="width:260px;">
                <h3>Card title</h3>
                <p class="meta">Court descriptif ou extrait.</p>
            </div>

            <!-- Card with meta and actions (entire card is not a link here, example of content) -->
            <div class="card" style="width:260px;">
                <h3>Card avec actions</h3>
                <p class="meta">Auteur · 12 avril 2026</p>
                <div style="margin-top:0.75rem;display:flex;gap:0.5rem;">
                    <a class="btn btn--ghost" href="#">Voir</a>
                    <a class="btn btn--secondary" href="#">Modifier</a>
                </div>
            </div>
        </div>

    </section>

    <section class="site-section">
        <h2>Navigation</h2>
        <nav aria-label="breadcrumb"><ol><li>Home</li><li>Section</li><li>Current</li></ol></nav>
        <div class="pagination" style="margin-top:1rem;">
            <a class="pagination__link" href="#">&laquo; Préc</a>
            <a class="pagination__link" href="#">1</a>
            <span class="pagination__link is-current">2</span>
            <a class="pagination__link" href="#">3</a>
            <a class="pagination__link" href="#">Suiv &raquo;</a>
        </div>
    </section>

    <section class="site-section">
        <h2>Alertes & Modal</h2>
        <div class="alert alert--success">Succès - message exemple</div>
        <div class="alert alert--danger">Erreur - message exemple</div>

        <!-- use data-confirm so modal.js handles opening -->
        <button class="btn btn--primary" type="button" data-confirm="Voulez-vous confirmer ?">Ouvrir modal</button>
    </section>

</main>

<?php require_once 'layouts/_footer.php' ?>
