<aside class="widget shop-filter mb-30">
    <div class="widget-title">
        <span class="widget-sidebar-label">Цена</span>
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

        function syncAddressBar(href) {
            const url = new URL(href, window.location.origin);
            url.searchParams.delete('_token');
            url.searchParams.delete('redirect_to');
            if (currentOrder) {
                url.searchParams.set('price_filter', currentOrder);
            } else {
                url.searchParams.delete('price_filter');
            }
            history.replaceState(null, '', url.pathname + url.search);
        }

        /** Мета из ответа сервера (тот же источник, что и при полной перезагрузке) */
        function syncHeadFromFetchedDocument(doc) {
            const titleEl = doc.querySelector('title');
            if (titleEl && titleEl.textContent.trim() !== '') {
                document.title = titleEl.textContent.trim();
            }
            const metaDesc = doc.querySelector('meta[name="description"]');
            if (metaDesc) {
                const content = metaDesc.getAttribute('content') ?? '';
                let cur = document.querySelector('meta[name="description"]');
                if (cur) {
                    cur.setAttribute('content', content);
                }
            }
            const canonical = doc.querySelector('link[rel="canonical"]');
            let curCanon = document.querySelector('link[rel="canonical"]');
            if (canonical && canonical.getAttribute('href')) {
                const hrefCanon = canonical.getAttribute('href');
                if (!curCanon) {
                    curCanon = document.createElement('link');
                    curCanon.setAttribute('rel', 'canonical');
                    document.head.appendChild(curCanon);
                }
                curCanon.setAttribute('href', hrefCanon);
            } else if (curCanon) {
                curCanon.remove();
            }
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
            const newPag = doc.querySelector('.shop-pagination');
            const oldPag = document.querySelector('.shop-pagination');

            if (newPag && oldPag) {
                oldPag.outerHTML = newPag.outerHTML;
            } else if (newPag && !oldPag) {
                const gridView = document.getElementById('grid-view');
                if (gridView) gridView.insertAdjacentHTML('afterend', newPag.outerHTML);
            }

            syncHeadFromFetchedDocument(doc);
            syncAddressBar(href);
        }

        document.addEventListener('click', function (e) {
            // Клик по сортировке
            const filterBtn = e.target.closest('.js-price-filter');
            if (filterBtn) {
                e.preventDefault();
                currentOrder = filterBtn.dataset.order || '';
                const sortUrl = new URL(window.location.href);
                sortUrl.searchParams.delete('page');
                fetchAndSwap(sortUrl.toString());
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