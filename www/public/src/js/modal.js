// modal.js - accessible modal dialog (simple focus trap)
(function(){
    const modal = document.getElementById('app-modal');
    if(!modal) return;

    const overlay = modal.querySelector('[data-modal-close]');
    const btnCancel = modal.querySelector('[data-modal-cancel]');
    const btnConfirm = modal.querySelector('[data-modal-confirm]');
    const titleEl = modal.querySelector('.modal__title');
    const contentEl = modal.querySelector('#modal-content');

    let activeTrigger = null;
    let confirmCallback = null;

    function openModal(options){
        activeTrigger = options.trigger || null;
        titleEl.textContent = options.title || 'Confirmer';
        contentEl.textContent = options.message || 'Êtes-vous sûr ?';
        confirmCallback = options.onConfirm || null;

        modal.style.display = 'block';
        modal.setAttribute('aria-hidden','false');
        document.body.style.overflow = 'hidden';

        // focus first focusable (cancel button)
        btnCancel.focus();

        // trap focus
        document.addEventListener('focus', trapFocus, true);
        document.addEventListener('keydown', onKeyDown);
    }

    function closeModal(){
        modal.style.display = 'none';
        modal.setAttribute('aria-hidden','true');
        document.body.style.overflow = '';
        document.removeEventListener('focus', trapFocus, true);
        document.removeEventListener('keydown', onKeyDown);
        if(activeTrigger && typeof activeTrigger.focus === 'function') activeTrigger.focus();
        activeTrigger = null;
        confirmCallback = null;
    }

    function trapFocus(e){
        if(!modal.contains(e.target)){
            e.stopPropagation();
            btnCancel.focus();
        }
    }

    function onKeyDown(e){
        if(e.key === 'Escape') closeModal();
        if(e.key === 'Enter' && document.activeElement === btnConfirm){
            e.preventDefault();
            btnConfirm.click();
        }
    }

    btnCancel.addEventListener('click', function(){ closeModal(); });
    overlay.addEventListener('click', function(){ closeModal(); });
    btnConfirm.addEventListener('click', function(){
        if(typeof confirmCallback === 'function'){
            confirmCallback();
        }
        closeModal();
    });

    // attach to global so other scripts can call openConfirm
    window.openConfirm = function(opts){
        openModal(opts || {});
    };

    // attach listeners to elements with data-confirm attribute
    document.addEventListener('click', function(e){
        const el = e.target.closest('[data-confirm]');
        if(!el) return;
        e.preventDefault();
        const message = el.getAttribute('data-confirm') || 'Êtes-vous sûr ?';
        const title = el.getAttribute('data-confirm-title') || 'Confirmer';
        const href = el.getAttribute('href');
        openModal({ title: title, message: message, trigger: el, onConfirm: function(){
            if(href){
                // follow link
                window.location.href = href;
            } else if(el.dataset && el.dataset.action){
                // if a JS action is defined
                const fnName = el.dataset.action;
                if(typeof window[fnName] === 'function') window[fnName](el);
            }
        }});
    });

})();
