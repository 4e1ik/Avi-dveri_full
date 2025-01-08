// let menuBtn = document.querySelector('.open_popup_application');
// let popup = document.querySelector('.popup_application');
// let crossBtn = document.querySelector('.popup__cross_application');
//
//
// document.addEventListener('DOMContentLoaded', function () {
//     var menuBtn = document.querySelectorAll('.open_popup_application');
//     menuBtn.forEach(function (element) {
//         element.addEventListener('click', function () {
//             popup.style.display = 'block';
//         });
//     })
// })
//
// crossBtn.onclick = function () {
//     popup.style.display = 'none';
// };
//
// window.onclick = function (event) {
//     if (event.target === document.querySelector('.popup__body_application')) {
//         popup.style.display = 'none';
//     }
// };

document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.open_popup_application');
    const popup = document.querySelector('.popup_application');
    const crossBtn = document.querySelector('.popup__cross_application');
    const titleInput = document.querySelector('#mail_form input[name="title"]');

    buttons.forEach(function (button) {
        button.addEventListener('click', function () {
            const productTitle = this.getAttribute('data-title');
            titleInput.value = productTitle; // Устанавливаем название продукта
            popup.style.display = 'block';
        });
    });

    crossBtn.onclick = function () {
        popup.style.display = 'none';
    };

    window.onclick = function (event) {
        if (event.target === document.querySelector('.popup__body_application')) {
            popup.style.display = 'none';
        }
    };
});
