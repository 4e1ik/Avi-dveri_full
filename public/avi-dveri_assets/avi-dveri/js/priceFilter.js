document.addEventListener('DOMContentLoaded', function () {
    const productsContainer = document.getElementById('products');
    const products = Array.from(productsContainer.getElementsByClassName('product'));

    // Функция для сортировки товаров
    function sortProducts(order) {
        const sortedProducts = products.sort((a, b) => {
            const priceA = parseFloat(a.getAttribute('data-price'));
            const priceB = parseFloat(b.getAttribute('data-price'));

            if (order === 'ASC') {
                return priceA - priceB; // По возрастанию
            } else if (order === 'DESC') {
                return priceB - priceA; // По убыванию
            }
            return 0;
        });

        // Очищаем контейнер с товарами
        productsContainer.innerHTML = '';

        // Добавляем отсортированные товары обратно в контейнер
        sortedProducts.forEach(product => {
            productsContainer.appendChild(product);
        });

        // Сохраняем выбранный порядок в localStorage
        localStorage.setItem('sortOrder', order);
    }

    // Восстанавливаем выбранный порядок из localStorage
    const savedOrder = localStorage.getItem('sortOrder');
    if (savedOrder) {
        const radioButton = document.querySelector(`input[value="${savedOrder}"]`);
        if (radioButton) {
            radioButton.checked = true;
            sortProducts(savedOrder);
        }
    }

    // Обработчики событий для радио-кнопок
    document.querySelectorAll('input[name="price_filter"]').forEach(radio => {
        radio.addEventListener('change', function () {
            const selectedOrder = this.value; // Получаем значение выбранной кнопки
            sortProducts(selectedOrder); // Сортируем товары
        });
    });
});