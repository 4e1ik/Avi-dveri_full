<aside class="widget widget-color mb-30 catalog-global-filter">
    <div class="widget-title">
        <span class="widget-sidebar-label">Фильтр</span>
    </div>
    <form class="widget-info color-filter clearfix catalog-global-filter__form" action="#" method="get"
          data-filter-api="{{ url('/api/filter') }}"
          data-filter-category="{{ $category === 'fitting' ? 'fitting' : 'door' }}"
          @if($category === 'door' && isset($type) && $type !== '') data-filter-door-type="{{ $type }}" @endif>
        <div class="catalog-global-filter__block catalog-global-filter__block--price">
            <h3 class="catalog-global-filter__subhead">Цена</h3>
            <ul class="catalog-global-filter__list" id="js-catalog-price-sort" role="radiogroup" aria-label="Сортировка по цене">
                <li>
                    <label class="catalog-global-filter__item catalog-global-filter__item--sort">
                        <span class="catalog-global-filter__item-text">По возрастанию</span>
                        <input type="radio" name="price_filter" value="ASC" class="catalog-global-filter__price-input">
                        <span class="catalog-global-filter__item-meta" aria-hidden="true">↑</span>
                    </label>
                </li>
                <li>
                    <label class="catalog-global-filter__item catalog-global-filter__item--sort">
                        <span class="catalog-global-filter__item-text">По убыванию</span>
                        <input type="radio" name="price_filter" value="DESC" class="catalog-global-filter__price-input">
                        <span class="catalog-global-filter__item-meta" aria-hidden="true">↓</span>
                    </label>
                </li>
            </ul>
        </div>

        <style>
            /* .widget-title — flex: подпись сжимается по тексту, border обрывается — тянем на всю ширину */
            aside.catalog-global-filter > .widget-title {
                width: 100%;
            }
            aside.catalog-global-filter > .widget-title .widget-sidebar-label {
                flex: 1 1 100%;
                align-self: stretch;
                width: 100%;
                min-width: 0;
                box-sizing: border-box;
            }
            /* В теме .color-filter ul li { float:left } — сбрасываем для аккуратного списка */
            aside.catalog-global-filter .catalog-global-filter__list {
                list-style: none;
                margin: 0;
                padding: 0;
            }
            aside.catalog-global-filter .catalog-global-filter__list > li {
                float: none;
                width: 100%;
                margin: 0;
                padding: 0;
                line-height: normal;
            }
            .catalog-global-filter .catalog-global-filter__form {
                padding-top: 6px;
            }
            .catalog-global-filter .catalog-global-filter__block {
                margin: 0 0 18px;
                padding: 0 0 16px;
                border-bottom: 1px solid #f0f0f0;
            }
            .catalog-global-filter .catalog-global-filter__block:last-child {
                margin-bottom: 0;
                padding-bottom: 0;
                border-bottom: 0;
            }
            .catalog-global-filter .catalog-global-filter__block--price .catalog-global-filter__subhead {
                margin-top: 30px;
            }
            .catalog-global-filter .catalog-global-filter__subhead {
                display: block;
                width: 100%;
                box-sizing: border-box;
                margin: 18px 0 10px;
                padding: 0 0 8px;
                border-bottom: 2px solid #f6f6f6;
                font-family: Lato-SemiBold, Lato, "Helvetica Neue", Arial, sans-serif;
                font-size: 14px;
                font-weight: 600;
                line-height: 1.25;
                letter-spacing: 0.06em;
                text-transform: uppercase;
                color: #666;
            }
            .catalog-global-filter .catalog-global-filter__item {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                margin: 0;
                padding: 8px 10px 8px 8px;
                min-height: 36px;
                font-family: Lato, "Helvetica Neue", Arial, sans-serif;
                font-size: 14px;
                font-weight: 400;
                line-height: 1.35;
                color: #666;
                border-radius: 2px;
                cursor: pointer;
                transition: background 0.2s ease, color 0.2s ease;
            }
            .catalog-global-filter .catalog-global-filter__item:hover {
                color: #c8a165;
                background: #fafafa;
            }
            .catalog-global-filter .catalog-global-filter__item-text {
                flex: 1;
                min-width: 0;
            }
            .catalog-global-filter .catalog-global-filter__item-meta {
                flex-shrink: 0;
                min-width: 1.5rem;
                text-align: right;
                font-size: 13px;
                color: #999;
                transition: color 0.2s ease;
            }
            .catalog-global-filter .catalog-global-filter__item--sort .catalog-global-filter__price-input {
                position: absolute;
                opacity: 0;
                width: 0;
                height: 0;
                pointer-events: none;
            }
            .catalog-global-filter .catalog-global-filter__item--sort:has(.catalog-global-filter__price-input:checked) {
                color: #c8a165;
                background: #fffdf8;
            }
            .catalog-global-filter .catalog-global-filter__item--sort:has(.catalog-global-filter__price-input:checked) .catalog-global-filter__item-meta {
                color: #c8a165;
                font-weight: 600;
            }
            .catalog-global-filter .catalog-global-filter__item--sort:has(.catalog-global-filter__price-input:focus-visible) {
                outline: 2px solid #c8a165;
                outline-offset: 1px;
            }
            .catalog-global-filter .catalog-global-filter__item--checkbox {
                justify-content: flex-start;
                gap: 10px;
            }
            .catalog-global-filter .catalog-global-filter__item--checkbox .catalog-global-filter__item-text {
                display: flex;
                align-items: center;
                gap: 10px;
            }
            .catalog-global-filter .catalog-global-filter__cb {
                flex-shrink: 0;
                width: 15px;
                height: 15px;
                margin: 0;
                accent-color: #c8a165;
                cursor: pointer;
            }
            .catalog-global-filter .catalog-global-filter__actions {
                display: flex;
                flex-direction: column;
                gap: 10px;
                margin-top: 4px;
                padding-top: 18px;
                border-top: 1px solid #f0f0f0;
            }
            .catalog-global-filter .catalog-global-filter__btn {
                display: block;
                width: 100%;
                margin: 0;
                padding: 12px 16px;
                font-family: Lato-SemiBold, Lato, "Helvetica Neue", Arial, sans-serif;
                font-size: 13px;
                font-weight: 600;
                line-height: 1.25;
                letter-spacing: 0.04em;
                text-transform: uppercase;
                text-align: center;
                border: 1px solid transparent;
                border-radius: 2px;
                cursor: pointer;
                transition: background 0.2s ease, color 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
            }
            .catalog-global-filter .catalog-global-filter__btn--apply {
                color: #fff;
                background: #c8a165;
                border-color: #c8a165;
                box-shadow: 0 1px 0 rgba(0, 0, 0, 0.06);
            }
            .catalog-global-filter .catalog-global-filter__btn--apply:hover {
                background: #b89155;
                border-color: #b89155;
                color: #fff;
            }
            .catalog-global-filter .catalog-global-filter__btn--apply:focus-visible {
                outline: 2px solid #c8a165;
                outline-offset: 2px;
            }
            .catalog-global-filter .catalog-global-filter__btn--reset {
                color: #c87065;
                background: #fff;
                border-color: rgba(200, 112, 101, 0.45);
                box-shadow: none;
            }
            .catalog-global-filter .catalog-global-filter__btn--reset:hover {
                color: #fff;
                background: #c87065;
                border-color: #c87065;
            }
            .catalog-global-filter .catalog-global-filter__btn--reset:focus-visible {
                outline: 2px solid #c87065;
                outline-offset: 2px;
            }
            .catalog-global-filter .catalog-global-filter__picklist {
                margin: 0;
            }
            .catalog-global-filter .catalog-global-filter__search {
                display: block;
                width: 100%;
                box-sizing: border-box;
                margin: 0 0 10px;
                padding: 9px 10px;
                font-family: Lato, "Helvetica Neue", Arial, sans-serif;
                font-size: 13px;
                line-height: 1.35;
                color: #444;
                background: #fff;
                border: 1px solid #e0e0e0;
                border-radius: 2px;
                transition: border-color 0.2s ease, box-shadow 0.2s ease;
            }
            .catalog-global-filter .catalog-global-filter__search::placeholder {
                color: #aaa;
            }
            .catalog-global-filter .catalog-global-filter__search:hover {
                border-color: #ccc;
            }
            .catalog-global-filter .catalog-global-filter__search:focus {
                outline: none;
                border-color: #c8a165;
                box-shadow: 0 0 0 1px rgba(200, 161, 101, 0.25);
            }
            .catalog-global-filter .catalog-global-filter__picklist-scroll {
                max-height: 220px;
                overflow-y: auto;
                margin: 0;
                padding: 2px 4px 2px 0;
                border: 1px solid #f0f0f0;
                border-radius: 2px;
                background: #fafafa;
            }
            .catalog-global-filter .catalog-global-filter__picklist-scroll .catalog-global-filter__list {
                margin: 0;
            }
            .catalog-global-filter .catalog-global-filter__picklist-scroll .catalog-global-filter__item {
                background: transparent;
            }
            .catalog-global-filter .catalog-global-filter__sr-only {
                position: absolute;
                width: 1px;
                height: 1px;
                padding: 0;
                margin: -1px;
                overflow: hidden;
                clip: rect(0, 0, 0, 0);
                white-space: nowrap;
                border: 0;
            }
        </style>

        @if($category === 'door')
            @if(($type ?? null) === 'entrance')
                <div class="catalog-global-filter__block">
                    <h3 class="catalog-global-filter__subhead">Назначение</h3>
                    <ul class="catalog-global-filter__list">
                        @foreach(config('door_functions') as $value => $title)
                            <li>
                                <label class="catalog-global-filter__item catalog-global-filter__item--checkbox">
                                    <span class="catalog-global-filter__item-text">
                                        <input type="checkbox" name="function[]" value="{{ $value }}"
                                               class="catalog-global-filter__cb">
                                        <span>{{ $value }}</span>
                                    </span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @elseif(($type ?? null) === 'interior')
                <div class="catalog-global-filter__block">
                    <h3 class="catalog-global-filter__subhead">Материал</h3>
                    <ul class="catalog-global-filter__list">
                        @foreach(config('door_materials') as $value => $title)
                            <li>
                                <label class="catalog-global-filter__item catalog-global-filter__item--checkbox">
                                    <span class="catalog-global-filter__item-text">
                                        <input type="checkbox" name="material[]" value="{{ $value }}"
                                               class="catalog-global-filter__cb">
                                        <span>{{ $value }}</span>
                                    </span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @elseif($category === 'fitting')
            @if(($type ?? null))
                <div class="catalog-global-filter__block">
                    <h3 class="catalog-global-filter__subhead">Сегмент</h3>
                    <ul class="catalog-global-filter__list">
                        @foreach(config('fittings_functions') as $value => $title)
                            <li>
                                <label class="catalog-global-filter__item catalog-global-filter__item--checkbox">
                                <span class="catalog-global-filter__item-text">
                                    <input type="checkbox" name="function[]" value="{{ $value }}"
                                           class="catalog-global-filter__cb">
                                    <span>{{ $value }}</span>
                                </span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @endif
        <div class="catalog-global-filter__block">
            <h3 class="catalog-global-filter__subhead">Особые предложения</h3>
            <ul class="catalog-global-filter__list">
                @foreach(config('labels') as $value => $title)
                    <li>
                        <label class="catalog-global-filter__item catalog-global-filter__item--checkbox">
                            <span class="catalog-global-filter__item-text">
                                <input type="checkbox" name="label[]" value="{{ $value }}"
                                       class="catalog-global-filter__cb">
                                <span>{{ $title }}</span>
                            </span>
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
        @isset($manufacturers)
            @if($manufacturers->isNotEmpty())
                <div class="catalog-global-filter__block">
                    <h3 class="catalog-global-filter__subhead">Производители</h3>
                    <div class="catalog-global-filter__picklist">
                        <label class="catalog-global-filter__sr-only" for="js-manufacturer-search">Поиск производителя</label>
                        <input type="search"
                               id="js-manufacturer-search"
                               class="catalog-global-filter__search"
                               placeholder="Поиск по названию"
                               autocomplete="off"
                               inputmode="search">
                        <div class="catalog-global-filter__picklist-scroll">
                            <ul class="catalog-global-filter__list" id="js-manufacturer-list">
                                @foreach($manufacturers as $manufacturer)
                                    <li data-mfg-label="{{ $manufacturer->name }}">
                                        <label class="catalog-global-filter__item catalog-global-filter__item--checkbox">
                                            <span class="catalog-global-filter__item-text">
                                                <input type="checkbox" name="manufacturer_id[]" value="{{ $manufacturer->id }}"
                                                       class="catalog-global-filter__cb">
                                                <span>{{ $manufacturer->name }}</span>
                                            </span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        @endisset

        <div class="catalog-global-filter__actions">
            <button type="submit" class="catalog-global-filter__btn catalog-global-filter__btn--apply">
                Применить фильтр
            </button>
            <button type="button" class="catalog-global-filter__btn catalog-global-filter__btn--reset js-catalog-filter-reset">
                Сбросить фильтр
            </button>
        </div>
    </form>
</aside>

<script>
    (function () {
        var form = document.querySelector('.catalog-global-filter__form');
        var root = document.getElementById('js-catalog-price-sort');
        if (!form) return;

        /** Имена чекбоксов, которые читаются из URL (несколько значений — getAll) */
        var ARRAY_PARAM_NAMES = ['label[]', 'function[]', 'material[]', 'manufacturer_id[]'];

        function syncFormFromUrl() {
            var params = new URL(window.location.href).searchParams;

            ARRAY_PARAM_NAMES.forEach(function (name) {
                var selected = params.getAll(name);
                form.querySelectorAll('input[type="checkbox"][name="' + name + '"]').forEach(function (inp) {
                    inp.checked = selected.indexOf(inp.value) !== -1;
                });
            });

            if (!root) return;
            var price = params.get('price_filter') || '';
            form.querySelectorAll('input[name="price_filter"]').forEach(function (inp) {
                inp.checked = inp.value === price && (price === 'ASC' || price === 'DESC');
            });
        }

        syncFormFromUrl();
        window.addEventListener('popstate', syncFormFromUrl);

        var mSearch = document.getElementById('js-manufacturer-search');
        var mList = document.getElementById('js-manufacturer-list');
        if (mSearch && mList) {
            mSearch.addEventListener('input', function () {
                var q = mSearch.value.trim().toLowerCase();
                mList.querySelectorAll('li[data-mfg-label]').forEach(function (li) {
                    var lab = (li.getAttribute('data-mfg-label') || '').toLowerCase();
                    li.style.display = !q || lab.indexOf(q) !== -1 ? '' : 'none';
                });
            });
        }

        function appendChecked(params, inputName, paramName) {
            form.querySelectorAll('input[name="' + inputName + '"]:checked').forEach(function (el) {
                params.append(paramName, el.value);
            });
        }

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            var params = new URLSearchParams();

            var pr = form.querySelector('input[name="price_filter"]:checked');
            if (pr) params.set('price_filter', pr.value);

            appendChecked(params, 'label[]', 'label[]');
            appendChecked(params, 'function[]', 'function[]');
            appendChecked(params, 'material[]', 'material[]');
            appendChecked(params, 'manufacturer_id[]', 'manufacturer_id[]');

            var q = params.toString();
            var path = window.location.pathname;
            var hash = window.location.hash || '';
            window.location.assign(path + (q ? '?' + q : '') + hash);
        });

        form.querySelector('.js-catalog-filter-reset')?.addEventListener('click', function () {
            form.querySelectorAll('input[type="checkbox"]').forEach(function (el) { el.checked = false; });
            form.querySelectorAll('input[type="radio"][name="price_filter"]').forEach(function (el) { el.checked = false; });
            window.location.assign(window.location.pathname + (window.location.hash || ''));
        });
    })();
</script>
