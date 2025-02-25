// document.addEventListener('DOMContentLoaded', function () {
//     const productsContainer = document.getElementById('products');
//     const products = Array.from(productsContainer.getElementsByClassName('product'));
//
//     // Функция для сортировки товаров
//     function sortProducts(order) {
//         const sortedProducts = products.sort((a, b) => {
//             const priceA = parseFloat(a.getAttribute('data-price'));
//             const priceB = parseFloat(b.getAttribute('data-price'));
//
//             if (order === 'ASC') {
//                 return priceA - priceB; // По возрастанию
//             } else if (order === 'DESC') {
//                 return priceB - priceA; // По убыванию
//             }
//             return 0;
//         });
//
//         // Очищаем контейнер с товарами
//         productsContainer.innerHTML = '';
//
//         // Добавляем отсортированные товары обратно в контейнер
//         sortedProducts.forEach(product => {
//             productsContainer.appendChild(product);
//         });
//
//         // Сохраняем выбранный порядок в localStorage
//         localStorage.setItem('sortOrder', order);
//     }
//
//     // Восстанавливаем выбранный порядок из localStorage
//     const savedOrder = localStorage.getItem('sortOrder');
//     if (savedOrder) {
//         const radioButton = document.querySelector(`input[value="${savedOrder}"]`);
//         if (radioButton) {
//             radioButton.checked = true;
//             sortProducts(savedOrder);
//         }
//     }
//
//     // Обработчики событий для радио-кнопок
//     document.querySelectorAll('input[name="price_filter"]').forEach(radio => {
//         radio.addEventListener('change', function () {
//             const selectedOrder = this.value; // Получаем значение выбранной кнопки
//             sortProducts(selectedOrder); // Сортируем товары
//         });
//     });
// });

// async function fetchData() {
//     const button1 = document.getElementById('button1');
//     const button2 = document.getElementById('button2');
//
//
//     try {
//         const response = await fetch('/test', {
//             method: 'GET',
//             headers: {
//                 'Accept': 'application/json',
//                 'Content-Type': 'application/json'
//             }
//         });
//
//         if (!response.ok) {
//             throw new Error('Ошибка сети');
//         }
//
//         const data = await response.json();
//         console.log('Успех:', data);
//     } catch (error) {
//         console.error('Ошибка:', error);
//     }
// }
//
// // Вызов функции
// fetchData();

// document.getElementById('button1').addEventListener('click', async () => {
//     const response = await fetch('/test');
//     const { html } = await response.json();
//     document.getElementById('products').innerHTML = html;
// });

// document.getElementById('button1').addEventListener('click', async () => {
//     try {
//         const response = await fetch('/price_filter');
//         const html = await response.text();
//         document.getElementById('products').innerHTML = html;
//     } catch (error) {
//         console.error('Ошибка:', error);
//     }
// });