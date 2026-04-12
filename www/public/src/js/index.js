// index.js - initialize tooltips if bootstrap is available

(function () {
    try {
        if (window.bootstrap && bootstrap.Tooltip) {
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
        }
    } catch (e) {
        // fail silently if bootstrap isn't present
        console.warn('Bootstrap tooltips not initialized:', e.message);
    }
})();

// small helper to trigger the reusable modal from demo buttons
document.addEventListener('click', function(e){
    const btn = e.target.closest('.js-open-modal');
    if(!btn) return;
    e.preventDefault();
    const content = btn.getAttribute('data-modal-content') || 'Confirmer ?';
    // open the modal implemented in modal.js
    const modalEl = document.getElementById('app-modal');
    if(!modalEl) return;
    const contentEl = modalEl.querySelector('#modal-content');
    if(contentEl) contentEl.textContent = content;
    // mark confirm button to redirect to nothing by default
    modalEl.style.display = 'block';
    modalEl.setAttribute('aria-hidden','false');
    // focus on confirm
    const confirmBtn = modalEl.querySelector('[data-modal-confirm]');
    if(confirmBtn) confirmBtn.focus();
});
