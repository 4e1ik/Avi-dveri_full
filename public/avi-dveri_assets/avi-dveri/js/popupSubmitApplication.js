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

    // ===== ПОПАП "ОСТАВИТЬ ЗАЯВКУ" =====
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

            // Сбрасываем чекбокс при открытии
            const checkbox = popup.querySelector('#agreementCheckbox');
            const submitBtn = popup.querySelector('#submitButton');

            if (checkbox) {
                checkbox.checked = false;
                if (submitBtn) {
                    submitBtn.setAttribute('disabled', 'disabled');
                    submitBtn.classList.remove('btn-active');
                    submitBtn.classList.add('btn-disabled');
                }
            }
        },
    });

    // ===== ПОПАП "ЗАКАЗАТЬ ЗВОНОК" =====
    initPopup({
        popupSelector: '.popup_callback',
        openSelector: '.open_popup_callback',
        crossSelector: '.popup__cross_callback',
        bodySelector: '.popup__body_callback',
        onOpen: function (popup, button) {
            // Сбрасываем чекбокс при открытии
            const checkbox = popup.querySelector('#agreementCheckbox');
            const submitBtn = popup.querySelector('#submitButton');

            if (checkbox) {
                checkbox.checked = false;
                if (submitBtn) {
                    submitBtn.setAttribute('disabled', 'disabled');
                    submitBtn.classList.remove('btn-active');
                    submitBtn.classList.add('btn-disabled');
                }
            }
        },
    });

    // ===== УПРАВЛЕНИЕ КНОПКОЙ ЧЕРЕЗ ЧЕКБОКС =====
    function updateButtonState(checkbox) {
        const popup = checkbox.closest('.popup_application, .popup_callback');
        if (!popup) return;

        const submitBtn = popup.querySelector('#submitButton');
        if (!submitBtn) return;

        if (checkbox.checked) {
            submitBtn.removeAttribute('disabled');
            submitBtn.classList.remove('btn-disabled');
            submitBtn.classList.add('btn-active');
        } else {
            submitBtn.setAttribute('disabled', 'disabled');
            submitBtn.classList.remove('btn-active');
            submitBtn.classList.add('btn-disabled');
        }
    }

    // Вешаем слушатели на все чекбоксы согласия (для обеих форм)
    document.querySelectorAll('#agreementCheckbox').forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            updateButtonState(this);
        });
        // Проверяем состояние при загрузке
        updateButtonState(checkbox);
    });

    // ===== ФУНКЦИЯ ДЛЯ ОТПРАВКИ ФОРМЫ =====
    window.onClick = function (event) {
        event.preventDefault();
        event.stopPropagation();

        const button = event.currentTarget;
        const popup = button.closest('.popup_application, .popup_callback');
        if (!popup) return;

        const checkbox = popup.querySelector('#agreementCheckbox');

        // Проверяем чекбокс
        if (!checkbox || !checkbox.checked) {
            // Показываем сообщение об ошибке
            alert('Пожалуйста, дайте согласие на обработку персональных данных');
            if (checkbox) checkbox.focus();
            return;
        }

        // Если чекбокс отмечен - отправляем форму
        const form = popup.querySelector('form');
        if (form) {
            form.submit();
        }
    };
});