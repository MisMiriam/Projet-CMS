// theme-toggle.js - theme toggle + mobile menu toggling

(function () {
    // minimal theme script: follow system preference only
    function applySystemTheme(){
        const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        if(prefersDark){
            document.documentElement.setAttribute('data-theme','dark');
            document.body.classList.add('theme--dark');
        } else {
            document.documentElement.removeAttribute('data-theme');
            document.body.classList.remove('theme--dark');
        }
    }

    applySystemTheme();

    // listen for changes in system preference
    if(window.matchMedia){
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', applySystemTheme);
    }

    // Mobile menu toggle (unchanged)
    const menuToggle = document.querySelector('.site-header__toggle');
    const navList = document.querySelector('.site-nav__list');
    if (menuToggle && navList) {
        menuToggle.addEventListener('click', function () {
            const isOpen = navList.classList.toggle('is-open');
            menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });
    }
})();
