document.addEventListener('DOMContentLoaded', () => {
    const panelBody = document.getElementById('panel-body');

    // Загружаем существующие значения из базы данных
    const existingSizes = Array.from(panelBody.querySelectorAll('.inputSize'));

    // Устанавливаем обработчики событий
    panelBody.addEventListener('click', (e) => {
        // Обработка кнопки добавления
        if (e.target.classList.contains('addButton')) {
            const inputSize = e.target.closest('.inputSize');
            const newInputSize = inputSize.cloneNode(true);

            // Очищаем значения полей в клонированном элементе
            newInputSize.querySelectorAll('input').forEach((input) => {
                input.value = ''; // Очищаем поле ввода
            });

            // Добавляем клонированный элемент
            panelBody.appendChild(newInputSize);
        }

        // Обработка кнопки удаления
        if (e.target.classList.contains('closeButton')) {
            const inputSize = e.target.closest('.inputSize');

            // Удаляем элемент только если их больше одного
            if (panelBody.querySelectorAll('.inputSize').length > 1) {
                inputSize.remove();
            } else {
                alert('Нельзя удалить последнее поле.');
            }
        }
    });

    // Если в базе данных уже есть значения, обрабатываем их
    if (existingSizes.length) {
        existingSizes.forEach((sizeBlock) => {
            const input = sizeBlock.querySelector('input');
            if (input && input.value) {
                // Убеждаемся, что значение уже установлено
                input.setAttribute('value', input.value);
            }
        });
    }
});
