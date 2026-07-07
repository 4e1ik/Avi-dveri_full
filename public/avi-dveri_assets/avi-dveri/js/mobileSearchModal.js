(function ($) {
    'use strict';

    var MODAL_ID = 'mobileSearchModal';
    var OPEN_CLASS = 'is-open';
    var MOBILE_MAX = 1199;

    function isMobileMenu() {
        return window.innerWidth <= MOBILE_MAX;
    }

    function getModal() {
        return document.getElementById(MODAL_ID);
    }

    function openModal() {
        if (!isMobileMenu()) {
            return;
        }

        var modal = getModal();
        if (!modal) {
            return;
        }

        modal.classList.add(OPEN_CLASS);
        modal.setAttribute('aria-hidden', 'false');

        window.setTimeout(function () {
            var input = modal.querySelector('input[type="text"]');
            if (input) {
                input.focus();
            }
        }, 50);
    }

    function closeModal() {
        var modal = getModal();
        if (!modal) {
            return;
        }

        modal.classList.remove(OPEN_CLASS);
        modal.setAttribute('aria-hidden', 'true');
    }

    $(document).on('click', '.popup__body_mobile_search', function (event) {
        if (event.target === this) {
            closeModal();
        }
    });

    $(document).on('click', '.mobile-search-open', function (event) {
        event.preventDefault();
        openModal();
    });

    $(document).on('click', '[data-mobile-search-close]', function () {
        closeModal();
    });

    $(document).on('click', '.mobile-search-modal .search_example a', function () {
        closeModal();
    });

    $(document).on('keydown', function (event) {
        if (event.key === 'Escape') {
            closeModal();
        }
    });

    $(window).on('resize', function () {
        if (!isMobileMenu()) {
            closeModal();
        }
    });
})(jQuery);
