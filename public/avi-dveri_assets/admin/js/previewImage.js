let uploadedFiles = []; // Глобальный массив для хранения всех добавленных файлов

function previewImage(event) {
    let newFiles = Array.from(event.target.files); // Преобразуем FileList в массив
    const container = document.getElementById('preview-container');

    // Проверяем текущий маршрут
    const currentPath = window.location.pathname;
    const isColorSelectionDisabled = currentPath.includes('/fittings/create') || currentPath.includes('/fittings/edit');

    // Добавляем новые файлы в глобальный массив
    newFiles.forEach((file) => {
        if (!uploadedFiles.find(existingFile => existingFile.name === file.name)) {
            uploadedFiles.push(file);
        }
    });

    // Очищаем контейнер и отображаем все файлы из uploadedFiles
    container.innerHTML = '';
    uploadedFiles.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function (e) {
            // Создаем контейнер для изображения, текстового поля и кнопки удаления
            const wrapper = document.createElement('div');
            wrapper.style.display = 'flex';
            wrapper.style.flexDirection = 'column';
            wrapper.style.alignItems = 'center';
            wrapper.style.margin = '10px';
            wrapper.style.border = '1px solid #ccc';
            wrapper.style.padding = '10px';
            wrapper.style.borderRadius = '5px';
            wrapper.classList.add('col-md-3');

            // Создаем превью изображения
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.maxWidth = '150px';
            img.style.marginBottom = '10px';

            wrapper.appendChild(img);

            // Если выбор цвета не отключен
            if (!isColorSelectionDisabled) {
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
                selectedOption.textContent = 'Выберите цвет двери';

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

                // Создаем скрытое поле для отправки значения на сервер
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = `door_image_color[${index}]`;
                hiddenInput.value = ''; // Устанавливается при выборе цвета

                // Если colors определена, заполняем опции
                if (typeof colors !== 'undefined') {
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
                            hiddenInput.value = color.value; // Обновляем значение скрытого поля
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
                }

                // Обработчик для открытия/закрытия выпадающего списка
                selectedOption.addEventListener('click', () => {
                    optionsContainer.style.display = optionsContainer.style.display === 'none' ? 'block' : 'none';
                });

                dropdown.appendChild(selectedOption);
                dropdown.appendChild(optionsContainer);

                wrapper.appendChild(dropdown);
                wrapper.appendChild(hiddenInput);
            }

            // Создаем текстовое поле для описания
            const descriptionInput = document.createElement('input');
            descriptionInput.type = 'text';
            descriptionInput.name = `temp_description_image[${index}]`;
            descriptionInput.placeholder = 'Введите описание';
            descriptionInput.style.marginTop = '10px';
            descriptionInput.style.width = '200px';
            descriptionInput.style.padding = '5px';
            descriptionInput.style.border = '1px solid #ccc';
            descriptionInput.style.borderRadius = '5px';

            wrapper.appendChild(descriptionInput);

            // Создаем кнопку "Удалить"
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Удалить';
            deleteButton.style.marginTop = '10px';
            deleteButton.style.backgroundColor = '#ff4d4d';
            deleteButton.style.color = 'white';
            deleteButton.style.border = 'none';
            deleteButton.style.padding = '5px 10px';
            deleteButton.style.borderRadius = '3px';
            deleteButton.style.cursor = 'pointer';

            deleteButton.onclick = () => {
                uploadedFiles.splice(index, 1); // Удаляем файл из массива
                wrapper.remove(); // Удаляем визуально
            };

            wrapper.appendChild(deleteButton);

            container.appendChild(wrapper); // Добавляем контейнер в основной контейнер
        };
        reader.readAsDataURL(file);
    });

    // Обновляем input[type="file"]
    updateFileInput(event.target, uploadedFiles);
}

// Функция для обновления input[type="file"] после изменения массива файлов
function updateFileInput(input, files) {
    const dataTransfer = new DataTransfer(); // Создаем новый объект DataTransfer

    files.forEach(file => {
        dataTransfer.items.add(file); // Добавляем все файлы в DataTransfer
    });

    input.files = dataTransfer.files; // Обновляем files у input
}
