document.addEventListener('DOMContentLoaded', function () {
    function initPopup(config) {
        const popup = document.querySelector(config.popupSelector);
        if (!popup) {
            return;
        }

        const crossBtn = popup.querySelector(config.crossSelector);
        const body = popup.querySelector(config.bodySelector);

        document.querySelectorAll(config.openSelector).forEach(function (button) {
            button.addEventListener('click', function (event) {
                event.preventDefault();

                if (config.onOpen) {
                    config.onOpen(popup, button);
                }

                popup.style.display = 'block';
            });
        });

        if (crossBtn) {
            crossBtn.addEventListener('click', function () {
                popup.style.display = 'none';
            });
        }

        if (body) {
            window.addEventListener('click', function (event) {
                if (event.target === body) {
                    popup.style.display = 'none';
                }
            });
        }
    }

    initPopup({
        popupSelector: '.popup_application',
        openSelector: '.open_popup_application',
        crossSelector: '.popup__cross_feedback',
        bodySelector: '.popup__body_application',
        onOpen: function (popup, button) {
            const titleInput = popup.querySelector('input[name="title"]');
            const productTitle = button.getAttribute('data-title');

            if (titleInput && productTitle) {
                titleInput.value = productTitle;
            }
        },
    });

    initPopup({
        popupSelector: '.popup_callback',
        openSelector: '.open_popup_callback',
        crossSelector: '.popup__cross_callback',
        bodySelector: '.popup__body_callback',
    });
});
