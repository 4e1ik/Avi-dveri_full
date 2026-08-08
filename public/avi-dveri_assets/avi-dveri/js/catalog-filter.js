document.addEventListener('DOMContentLoaded', function() {
    const filterForm = document.getElementById('filter-form');
    const productsContainer = document.getElementById('products');
    
    if (!filterForm || !productsContainer) return;

    let category = filterForm.dataset.filterCategory || 'door';

    if (!category) {
        const categoryInput = filterForm.querySelector('input[name="category"]');
        if (categoryInput) {
            category = categoryInput.value;
        }
    }

    if (!category) {
        category = window.location.pathname.includes('furnitura') ? 'fitting' : 'door';
    }

    let timeoutId = null;

    filterForm.addEventListener('change', function(e) {
        if (e.target.matches('input[type="checkbox"], input[type="radio"]')) {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(applyFilters, 150);
        }
    });

    function applyFilters() {
        const formData = new FormData(filterForm);
        const params = {
            category: category
        };

        for (let [key, value] of formData.entries()) {
            if (value === '' || value === null || key === 'category') continue;

            if (key.endsWith('[]')) {
                const cleanKey = key.slice(0, -2);
                if (!params[cleanKey]) {
                    params[cleanKey] = [];
                }
                params[cleanKey].push(value);
            } else {
                params[key] = value;
            }
        }

        for (let key in params) {
            if (Array.isArray(params[key]) && params[key].length === 0) {
                delete params[key];
            }
        }

        productsContainer.style.opacity = '0.5';
        productsContainer.style.pointerEvents = 'none';

        fetch('/api/filter/v2', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            },
            body: JSON.stringify(params)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success && data.data && data.data.data) {
                productsContainer.innerHTML = renderProducts(data.data.data);
                // ✅ Инициализируем новые кнопки
                initDynamicButtons();
            } else {
                productsContainer.innerHTML = '<div class="col-12 text-center"><p>Товары не найдены</p></div>';
            }
        })
        .catch(() => {
            showError('Ошибка при загрузке товаров');
        })
        .finally(() => {
            productsContainer.style.opacity = '1';
            productsContainer.style.pointerEvents = 'auto';
        });
    }

    function renderProducts(products) {
        if (!products || products.length === 0) {
            return '<div class="col-12 text-center"><p>Товары не найдены</p></div>';
        }

        let html = '';
        products.forEach(product => {
            html += `
                <div data-price="${product.price || 0}" class="product col-lg-4 col-md-6">
                    <div class="single-product">
                        <div class="product-img">
                            ${renderLabels(product.label || [])}
                            ${renderImage(product)}
                        </div>
                        <div class="product-info clearfix text-center">
                            <div class="fix">
                                <div class="post-title">
                                    <a href="${product.url || '#'}">${product.title || 'Без названия'}</a>
                                </div>
                                <span class="pro-price-2">от ${product.price || 0} ${product.currency || 'BYN'}</span>
                            </div>
                            <div class="product-action clearfix">
                                <button class="button-one submit-btn-4 open_popup_application" type="button"
                                    data-text="Оставить заявку" data-title="${product.title || 'Товар'}">
                                    Оставить заявку
                                </button>
                            </div>
                        </div>
                        <div class="product-details">
                            ${renderDetails(product)}
                        </div>
                    </div>
                </div>
            `;
        });
        return html;
    }

    function renderLabels(labels) {
        if (!labels || labels.length === 0) return '';

        const sortedLabels = [...labels].sort((a, b) => {
            if (a === 'native') return -1;
            if (b === 'native') return 1;
            return 0;
        });

        let html = '<div class="lables">';
        sortedLabels.forEach(label => {
            if (label === 'native') {
                html += `
                    <span class="pro-label-native" aria-label="На родныя тавары">
                        <span class="pro-label-native__track">
                            <span class="pro-label-native__pill">4%</span>
                            <span class="pro-label-native__expand">На родныя тавары</span>
                        </span>
                    </span>
                `;
            } else {
                let labelClass = 'hit-label';
                let labelText = 'Хит';
                
                if (label === 'new') {
                    labelClass = 'new-label';
                    labelText = 'Новинка';
                } else if (label === 'sale') {
                    labelClass = 'sale-label';
                    labelText = 'Скидка';
                } else if (label === 'order') {
                    labelClass = 'order-label';
                    labelText = 'На заказ';
                }
                
                html += `<span class="pro-label ${labelClass}">${labelText}</span>`;
            }
        });
        html += '</div>';
        return html;
    }

    function renderImage(product) {
        if (!product.image) return '';

        return `
            <a style="display: flex; justify-content: center;" href="${product.url || '#'}">
                <img style="object-fit: contain;" 
                     src="${product.image}" 
                     alt="${product.title || 'Товар'}"
                     loading="lazy"/>
            </a>
        `;
    }

    function renderDetails(product) {
        let html = '<ul>';
        
        const availabilityClass = product.availability ? 'product-availability--in-stock' : 'product-availability--on-order';
        const availabilityText = product.availability ? 'В наличии' : 'Под заказ';
        html += `<li><span class="${availabilityClass}">${availabilityText}</span></li>`;
        
        html += '</ul>';
        return html;
    }

    // ✅ Функция для инициализации динамических кнопок
    function initDynamicButtons() {
        const popup = document.querySelector('.popup_application');
        if (!popup) return;

        const crossBtn = popup.querySelector('.popup__cross_feedback');
        const body = popup.querySelector('.popup__body_application');

        // Находим все новые кнопки
        document.querySelectorAll('.open_popup_application').forEach(function(button) {
            // Проверяем, есть ли уже обработчик
            if (button.dataset.popupInit === 'true') return;
            
            // Добавляем обработчик
            button.addEventListener('click', function(event) {
                event.preventDefault();

                // Получаем название товара
                const productTitle = button.getAttribute('data-title');
                
                // Вставляем название в форму
                const titleInput = popup.querySelector('input[name="title"]');
                if (titleInput && productTitle) {
                    titleInput.value = productTitle;
                }

                // Сбрасываем чекбокс
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

                // Открываем попап
                popup.style.display = 'block';
            });

            // Отмечаем, что кнопка уже инициализирована
            button.dataset.popupInit = 'true';
        });
    }

    function showError(message) {
        productsContainer.innerHTML = `
            <div class="col-12 text-center" style="padding: 60px 0;">
                <h4 style="color: #e74c3c;">${message}</h4>
                <button onclick="location.reload()" class="btn btn-primary" style="margin-top: 15px;">
                    Попробовать снова
                </button>
            </div>
        `;
    }

    // ✅ Инициализируем кнопки при загрузке
    setTimeout(initDynamicButtons, 100);

    // ✅ Также вешаем MutationObserver для отслеживания новых кнопок
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'childList') {
                const addedNodes = mutation.addedNodes;
                addedNodes.forEach(function(node) {
                    if (node.nodeType === 1 && node.matches && node.matches('.open_popup_application')) {
                        initDynamicButtons();
                    }
                    // Ищем внутри добавленных узлов
                    if (node.nodeType === 1 && node.querySelectorAll) {
                        const buttons = node.querySelectorAll('.open_popup_application');
                        if (buttons.length > 0) {
                            initDynamicButtons();
                        }
                    }
                });
            }
        });
    });

    // Начинаем наблюдение за контейнером товаров
    observer.observe(productsContainer, {
        childList: true,
        subtree: true
    });
});