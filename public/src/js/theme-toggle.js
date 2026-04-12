// theme-toggle.js - theme toggle + mobile menu toggling

(function () {
    // Theme toggle handled by existing script later, keep logic for localStorage
    const toggle = document.querySelector('[data-theme-toggle]');
    if (toggle) {
        const apply = (isDark) => {
            document.body.classList.toggle('theme--dark', isDark);
            try { localStorage.setItem('themeDark', isDark ? '1' : '0'); } catch (e) {}
        };
        const saved = (function(){ try { return localStorage.getItem('themeDark'); } catch(e){ return null; } })();
        if (saved !== null) apply(saved === '1');
        toggle.addEventListener('click', function () { apply(!document.body.classList.contains('theme--dark')); });
    }

    // Mobile menu toggle
    const menuToggle = document.querySelector('.site-header__toggle');
    const navList = document.querySelector('.site-nav__list');
    if (menuToggle && navList) {
        menuToggle.addEventListener('click', function () {
            const isOpen = navList.classList.toggle('is-open');
            menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });
    }
})();
