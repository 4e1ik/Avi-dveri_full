document.addEventListener('DOMContentLoaded', () => {
    const databaseContainer = document.getElementById('database-container');
    const deleteImagesInput = document.getElementById('delete-images');
    const deleteImagesArray = []; // Массив для хранения ID удаляемых изображений

    // Определяем текущий маршрут
    const currentPath = window.location.pathname;

    // Флаг для проверки, нужно ли показывать выбор цвета
    const isFittingPage = currentPath.includes('/fitting');

    // Функция для оформления и добавления функциональности к изображению
    function styleDatabaseImage(imgElement) {
        const id = imgElement.dataset.id;
        const currentColor = imgElement.dataset.color; // Получаем текущий цвет из data-атрибута
        const currentDescription = imgElement.dataset.description; // Получаем текущее описание из data-атрибута
        const currentPrice = imgElement.dataset.price;
        const currentPricePerSet = imgElement.dataset.pricePerSet;

        // Создаем контейнер для изображения
        const wrapper = document.createElement('div');
        wrapper.style.display = 'flex';
        wrapper.style.flexDirection = 'column';
        wrapper.style.alignItems = 'center';
        wrapper.style.margin = '10px';
        wrapper.style.border = '1px solid #ccc';
        wrapper.style.padding = '10px';
        wrapper.style.width = '16em';
        wrapper.style.borderRadius = '5px';
        wrapper.classList.add('col-md-3');

        // Клонируем изображение
        const imgClone = imgElement.cloneNode(true);
        imgClone.style.maxWidth = '150px';
        imgClone.style.marginBottom = '10px';

        // Добавляем картинку в контейнер
        wrapper.appendChild(imgClone);

        // Создаем кастомный элемент для выбора цвета
        const dropdown = document.createElement('div');
        dropdown.style.position = 'relative';
        dropdown.style.width = '200px';
        dropdown.style.cursor = 'pointer';

        const selectedOption = document.createElement('div');
        selectedOption.style.display = 'flex';
        selectedOption.style.alignItems = 'center';
        selectedOption.style.justifyContent = 'space-between';
        selectedOption.style.border = '1px solid #ccc';
        selectedOption.style.borderRadius = '5px';
        selectedOption.style.padding = '5px 10px';
        selectedOption.style.backgroundColor = 'white';

        // Устанавливаем текст по умолчанию
        selectedOption.textContent = 'Выберите цвет';

        // Если есть текущий цвет, отображаем его сразу
        if (currentColor) {
            const selectedColor = colors.find(color => color.value === currentColor);
            if (selectedColor) {
                selectedOption.innerHTML = `
                        <img src="${selectedColor.image}" alt="${selectedColor.name}" style="width: 20px; height: 20px; margin-right: 10px; border-radius: 50%;">
                        <span>${selectedColor.name}</span>
                    `;
            }
        }

        // Создаем контейнер для вариантов
        const optionsContainer = document.createElement('div');
        optionsContainer.style.position = 'absolute';
        optionsContainer.style.top = '100%';
        optionsContainer.style.left = '0';
        optionsContainer.style.right = '0';
        optionsContainer.style.border = '1px solid #ccc';
        optionsContainer.style.borderRadius = '5px';
        optionsContainer.style.backgroundColor = 'white';
        optionsContainer.style.display = 'none';
        optionsContainer.style.zIndex = '1000';

        // Ограничиваем видимость списка и добавляем скролл
        optionsContainer.style.maxHeight = '180px'; // Примерно 6 строк по 30px каждая
        optionsContainer.style.overflowY = 'auto';

        // Скрытое поле для передачи цвета
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        if (isFittingPage) {
            hiddenInput.name = `fitting_image_color[${id}]`; // Для фиттингов
        } else {
            hiddenInput.name = `door_image_color[${id}]`; // Для других страниц
        }
        hiddenInput.value = currentColor || ''; // Устанавливаем значение цвета из базы

        // Заполняем выпадающий список
        colors.forEach(color => {
            const option = document.createElement('div');
            option.style.display = 'flex';
            option.style.alignItems = 'center';
            option.style.padding = '5px 10px';
            option.style.cursor = 'pointer';
            option.style.transition = 'background-color 0.2s ease';
            option.innerHTML = `
                    <img src="${color.image}" alt="${color.name}" style="width: 20px; height: 20px; margin-right: 10px; border-radius: 50%;">
                    <span>${color.name}</span>
                `;

            option.addEventListener('click', () => {
                selectedOption.innerHTML = option.innerHTML; // Обновляем выбранное значение
                hiddenInput.value = color.value; // Устанавливаем значение цвета
                optionsContainer.style.display = 'none'; // Закрываем список
            });

            option.addEventListener('mouseover', () => {
                option.style.backgroundColor = '#f0f0f0';
            });

            option.addEventListener('mouseout', () => {
                option.style.backgroundColor = 'white';
            });

            optionsContainer.appendChild(option);
        });

        selectedOption.addEventListener('click', () => {
            optionsContainer.style.display = optionsContainer.style.display === 'none' ? 'block' : 'none';
        });

        dropdown.appendChild(selectedOption);
        dropdown.appendChild(optionsContainer);

        wrapper.appendChild(dropdown); // Добавляем поле выбора цвета после изображения
        wrapper.appendChild(hiddenInput);

        // Поле описания
        const descriptionInput = document.createElement('input');
        descriptionInput.type = 'text';
        descriptionInput.name = `temp_description_image[${id}]`;
        descriptionInput.placeholder = 'Введите описание';
        descriptionInput.value = currentDescription || ''; // Устанавливаем описание из базы
        descriptionInput.style.marginTop = '10px';
        descriptionInput.style.width = '200px';
        descriptionInput.style.padding = '5px';
        descriptionInput.style.border = '1px solid #ccc';
        descriptionInput.style.borderRadius = '5px';

        // +++ ДОБАВЛЕНО: Поле для цены +++
        const priceInput = document.createElement('input');
        priceInput.type = 'number';
        priceInput.name = `temp_price[${id}]`;
        priceInput.placeholder = 'Цена';
        priceInput.min = 0;
        priceInput.step = 0.01;
        priceInput.value = currentPrice || '';
        priceInput.style.marginTop = '10px';
        priceInput.style.width = '200px';
        priceInput.style.padding = '5px';
        priceInput.style.border = '1px solid #ccc';
        priceInput.style.borderRadius = '5px';

        // +++ ДОБАВЛЕНО: Поле для цены за комплект +++
        const pricePerSetInput = document.createElement('input');
        pricePerSetInput.type = 'number';
        pricePerSetInput.name = `temp_price_per_set[${id}]`;
        pricePerSetInput.placeholder = 'Цена за комплект';
        pricePerSetInput.min = 0;
        pricePerSetInput.step = 0.01;
        pricePerSetInput.value = currentPricePerSet || '';
        pricePerSetInput.style.marginTop = '10px';
        pricePerSetInput.style.width = '200px';
        pricePerSetInput.style.padding = '5px';
        pricePerSetInput.style.border = '1px solid #ccc';
        pricePerSetInput.style.borderRadius = '5px';


        // Кнопка "Удалить"
        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Удалить';
        deleteButton.style.marginTop = '10px';
        deleteButton.style.backgroundColor = '#ff4d4d';
        deleteButton.style.color = 'white';
        deleteButton.style.border = 'none';
        deleteButton.style.padding = '5px 10px';
        deleteButton.style.borderRadius = '3px';
        deleteButton.style.cursor = 'pointer';

        deleteButton.addEventListener('click', () => {
            deleteImagesArray.push(id); // Добавляем ID в массив
            deleteImagesInput.value = deleteImagesArray.join(','); // Обновляем значение скрытого поля
            wrapper.remove(); // Удаляем визуально
        });

        // Добавляем описание и кнопку в контейнер
        wrapper.appendChild(descriptionInput);
        wrapper.appendChild(priceInput);
        wrapper.appendChild(pricePerSetInput);
        wrapper.appendChild(deleteButton);

        // Добавляем оформленный контейнер в базовый контейнер
        databaseContainer.appendChild(wrapper);
    }

    // Оформляем все изображения из базы данных
    const databaseImages = databaseContainer.querySelectorAll('img');
    databaseImages.forEach(img => {
        styleDatabaseImage(img);
        img.remove(); // Убираем оригинальное изображение
    });
});