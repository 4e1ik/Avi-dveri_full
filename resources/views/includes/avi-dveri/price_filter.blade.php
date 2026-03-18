<aside class="widget shop-filter mb-30">
    <div class="widget-title">
        <h4>Цена</h4>
        <div class="price__label">
            <button type="button" class="js-price-filter" data-order="DESC">↑</button>
            <button type="button" class="js-price-filter" data-order="ASC">↓</button>
        </div>
    </div>
</aside>

<script>
    (function () {
        // Текущее состояние сортировки: берём из URL (если есть), иначе пусто
        let currentOrder = (new URL(window.location.href)).searchParams.get('price_filter') || '';

        function buildFetchUrl(href) {
            const url = new URL(href, window.location.origin);
            url.searchParams.delete('_token');
            url.searchParams.delete('redirect_to');
            if (currentOrder) url.searchParams.set('price_filter', currentOrder);
            else url.searchParams.delete('price_filter');
            return url.toString();
        }

        async function fetchAndSwap(href) {
            const res = await fetch(buildFetchUrl(href), {
                method: 'GET',
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });

            const html = await res.text();
            if (!res.ok) {
                console.error('Fetch failed', res.status, html);
                return;
            }

            const doc = new DOMParser().parseFromString(html, 'text/html');

            // products
            const newProducts = doc.getElementById('products');
            const oldProducts = document.getElementById('products');
            if (newProducts && oldProducts) oldProducts.outerHTML = newProducts.outerHTML;

            // pagination
            if (newPag && oldPag) {
                oldPag.outerHTML = newPag.outerHTML;
            } else if (newPag && !oldPag) {
                const gridView = document.getElementById('grid-view');
                if (gridView) gridView.insertAdjacentHTML('afterend', newPag.outerHTML);
            }
            if (newNav && oldNav) {
                oldNav.outerHTML = newNav.outerHTML;
            } else if (newNav && !oldNav) {
                const gridView = document.getElementById('grid-view');
                if (gridView) gridView.insertAdjacentHTML('afterend', newNav.outerHTML);
            }

            // Не меняем address bar (вариант 2)
            // Если захочешь — можно добавить replaceState без _token/redirect_to.
        }

        document.addEventListener('click', function (e) {
            // Клик по сортировке
            const filterBtn = e.target.closest('.js-price-filter');
            if (filterBtn) {
                e.preventDefault();
                currentOrder = filterBtn.dataset.order || '';
                fetchAndSwap(window.location.href);
                return;
            }

            // Клик по пагинации
            const pageLink = e.target.closest('.shop-pagination a[href], ul.pagination a[href], nav[role="navigation"] a[href]');
            if (pageLink) {
                e.preventDefault();
                fetchAndSwap(pageLink.href);
            }
        });
    })();
</script>