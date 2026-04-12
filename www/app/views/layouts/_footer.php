</main>
<footer class="site-footer">
    <div class="site-footer__inner container">
        <p class="site-footer__copy">Copyright 2026</p>
        <a class="site-footer__link" href="https://github.com/MisMiriam/Projet-CMS">Projet</a>
    </div>
</footer>

<!-- modal réutilisable (caché par défaut) -->
<div id="app-modal" class="modal" aria-hidden="true" role="dialog" aria-modal="true" style="display:none">
    <div class="modal__overlay" data-modal-close></div>
    <div class="modal__dialog" role="document" aria-labelledby="modal-title">
        <header class="modal__header">
            <h2 id="modal-title" class="modal__title">Confirmer</h2>
        </header>
        <div id="modal-content" class="modal__content">Êtes-vous sûr ?</div>
        <footer class="modal__footer">
            <button class="btn btn--ghost" data-modal-cancel>Annuler</button>
            <button class="btn btn--danger" data-modal-confirm>Confirmer</button>
        </footer>
    </div>
</div>

<script src="/src/js/index.js"></script>
<script src="/src/js/theme-toggle.js"></script>
<script src="/src/js/modal.js"></script>
</body>

</html>