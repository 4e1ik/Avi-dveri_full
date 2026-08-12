document.addEventListener('DOMContentLoaded', function () {
    console.log('✅ Скрипт фильтра загружен');

    const filterForm = document.getElementById('filter-form');
    const productsContainer = document.getElementById('products');
    const paginationContainer = document.getElementById('pagination-container');

    if (!filterForm || !productsContainer) {
        console.error('❌ Критические элементы не найдены!');
        return;
    }

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
    let currentPage = 1;
    let isLoading = false;
    let isFilterApplied = false;

    // Получаем текущую страницу из URL
    function getCurrentPageFromUrl() {
        const urlParams = new URLSearchParams(window.location.search);
        const page = parseInt(urlParams.get('page'));
        return page > 0 ? page : 1;
    }
    currentPage = getCurrentPageFromUrl();

    // Проверяем активные фильтры
    function checkActiveFilters() {
        const formData = new FormData(filterForm);
        let hasFilters = false;

        for (let [key, value] of formData.entries()) {
            if (key === 'category' || value === '' || value === null) continue;
            hasFilters = true;
            break;
        }

        isFilterApplied = hasFilters;
        console.log('🔍 Активные фильтры:', isFilterApplied);
    }
    checkActiveFilters();

    function getFilterParams() {
        const formData = new FormData(filterForm);
        const params = {
            category: category,
            page: currentPage
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

        return params;
    }

    function updateProductCount(paginationData) {
        const countElement = document.getElementById('product-count');
        if (!countElement) return;

        const from = paginationData.from || 0;
        const to = paginationData.to || 0;
        const total = paginationData.total || 0;

        const fromStr = String(from).padStart(2, '0');
        const toStr = String(to).padStart(2, '0');

        countElement.textContent = `Показано ${fromStr}-${toStr} из ${total} результатов`;
        console.log('📊 Обновлен счетчик:', `Показано ${fromStr}-${toStr} из ${total} результатов`);
    }

    function applyFilters() {
        if (isLoading) {
            console.log('⏳ Уже выполняется запрос');
            return;
        }

        console.log('🔄 Применение фильтров, страница:', currentPage);
        isLoading = true;
        const params = getFilterParams();
        console.log('📤 Параметры запроса:', params);

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
                if (data.success && data.data) {
                    // Обновляем товары
                    if (data.data.data && data.data.data.length > 0) {
                        productsContainer.innerHTML = renderProducts(data.data.data);
                    } else {
                        productsContainer.innerHTML = '<div class="col-12 text-center"><p>Товары не найдены</p></div>';
                    }

                    // Обновляем счетчик товаров
                    updateProductCount(data.data);

                    // Обновляем пагинацию
                    if (paginationContainer) {
                        paginationContainer.innerHTML = renderPagination(data.data);
                    }

                    // Обновляем флаг фильтров
                    checkActiveFilters();

                    // Инициализируем элементы
                    initDynamicButtons();
                    initPaginationHandlers();

                    // Прокрутка к началу товаров
                    if (isFilterApplied || currentPage > 1) {
                        productsContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                } else {
                    productsContainer.innerHTML = '<div class="col-12 text-center"><p>Товары не найдены</p></div>';
                    if (paginationContainer) {
                        paginationContainer.innerHTML = '';
                    }
                    const countElement = document.getElementById('product-count');
                    if (countElement) {
                        countElement.textContent = 'Показано 00-00 из 0 результатов';
                    }
                }
            })
            .catch(error => {
                console.error('❌ Ошибка запроса:', error);
                showError('Ошибка при загрузке товаров');
            })
            .finally(() => {
                productsContainer.style.opacity = '1';
                productsContainer.style.pointerEvents = 'auto';
                isLoading = false;
            });
    }

    function renderPagination(paginationData) {
        if (!paginationData || paginationData.last_page <= 1) {
            return '';
        }

        const currentPage = paginationData.current_page || 1;
        const lastPage = paginationData.last_page || 1;

        let html = `<div class="shop-pagination text-center">`;
        html += `<div class="pagination"><ul>`;

        // Previous
        if (paginationData.prev_page_url) {
            html += `<li><a href="#" data-page="${currentPage - 1}"><i class="zmdi zmdi-long-arrow-left"></i></a></li>`;
        } else {
            html += `<li class="disabled"><span><i class="zmdi zmdi-long-arrow-left"></i></span></li>`;
        }

        // Страницы
        const pages = getPageRange(currentPage, lastPage);
        pages.forEach(page => {
            if (page === '...') {
                html += `<li class="disabled"><span>...</span></li>`;
            } else if (page === currentPage) {
                html += `<li class="active"><span>${page}</span></li>`;
            } else {
                html += `<li><a href="#" data-page="${page}">${page}</a></li>`;
            }
        });

        // Next
        if (paginationData.next_page_url) {
            html += `<li><a href="#" data-page="${currentPage + 1}"><i class="zmdi zmdi-long-arrow-right"></i></a></li>`;
        } else {
            html += `<li class="disabled"><span><i class="zmdi zmdi-long-arrow-right"></i></span></li>`;
        }

        html += '</ul></div></div>';
        return html;
    }

    function getPageRange(current, last) {
        const pages = [];
        const delta = 2;

        for (let i = 1; i <= last; i++) {
            if (i === 1 || i === last || (i >= current - delta && i <= current + delta)) {
                pages.push(i);
            } else if (pages[pages.length - 1] !== '...') {
                pages.push('...');
            }
        }
        return pages;
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

    function initDynamicButtons() {
        const popup = document.querySelector('.popup_application');
        if (!popup) return;

        document.querySelectorAll('.open_popup_application').forEach(function (button) {
            if (button.dataset.popupInit === 'true') return;

            button.addEventListener('click', function (event) {
                event.preventDefault();

                const productTitle = button.getAttribute('data-title');

                const titleInput = popup.querySelector('input[name="title"]');
                if (titleInput && productTitle) {
                    titleInput.value = productTitle;
                }

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

                popup.style.display = 'block';
            });

            button.dataset.popupInit = 'true';
        });
    }

    function initPaginationHandlers() {
        console.log('🔗 Инициализация обработчиков пагинации');
        const links = document.querySelectorAll('.pagination a[data-page]');
        console.log('📄 Найдено ссылок:', links.length);

        links.forEach(link => {
            link.removeEventListener('click', handlePaginationClick);
            link.addEventListener('click', handlePaginationClick);
        });
    }

    function handlePaginationClick(e) {
        e.preventDefault();
        const page = parseInt(this.getAttribute('data-page'));
        console.log('🔗 Клик по пагинации, страница:', page);

        if (page) {
            currentPage = page;
            applyFilters();

            const url = new URL(window.location.href);
            url.searchParams.set('page', page);
            window.history.pushState({}, '', url.toString());
        }
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
        if (paginationContainer) {
            paginationContainer.innerHTML = '';
        }
        const countElement = document.getElementById('product-count');
        if (countElement) {
            countElement.textContent = 'Показано 00-00 из 0 результатов';
        }
    }

    // Обработчик изменения фильтров
    filterForm.addEventListener('change', function (e) {
        if (e.target.matches('input[type="checkbox"], input[type="radio"]')) {
            console.log('🔄 Изменен фильтр:', e.target.name, '=', e.target.value);
            clearTimeout(timeoutId);
            timeoutId = setTimeout(function () {
                currentPage = 1;
                isFilterApplied = true;
                applyFilters();
            }, 150);
        }
    });

    // Инициализация
    setTimeout(function () {
        initDynamicButtons();
        initPaginationHandlers();
        console.log('✅ Инициализация завершена');
    }, 100);

    // MutationObserver
    const observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
            if (mutation.type === 'childList') {
                mutation.addedNodes.forEach(function (node) {
                    if (node.nodeType === 1) {
                        if (node.matches && node.matches('.open_popup_application')) {
                            initDynamicButtons();
                        }
                        if (node.matches && node.matches('.pagination a[data-page]')) {
                            initPaginationHandlers();
                        }
                        if (node.querySelectorAll) {
                            const buttons = node.querySelectorAll('.open_popup_application');
                            if (buttons.length > 0) initDynamicButtons();
                            const paginationLinks = node.querySelectorAll('.pagination a[data-page]');
                            if (paginationLinks.length > 0) initPaginationHandlers();
                        }
                    }
                });
            }
        });
    });

    if (productsContainer) {
        observer.observe(productsContainer, {
            childList: true,
            subtree: true
        });
    }

    if (paginationContainer) {
        observer.observe(paginationContainer, {
            childList: true,
            subtree: true
        });
    }
});