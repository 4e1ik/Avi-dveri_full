<aside class="widget widget-categories mb-30">
    <div class="widget-title">
        <span class="widget-sidebar-label">Каталог</span>
    </div>
    <div id="aside-catalog-nav" class="widget-info product-cat aside-catalog">
        <ul class="aside-catalog__list">
            <li class="aside-catalog__item" data-aside-catalog-item>
                <div class="aside-catalog__row">
                    <a class="aside-catalog__parent" href="{{ route('entrance_doors') }}"><span>Входные</span></a>
                    <button type="button" class="aside-catalog__toggle" aria-expanded="false"
                            aria-controls="aside-catalog-sub-entrance"
                            aria-label="Подразделы: входные двери">
                        <span class="aside-catalog__toggle-icon" aria-hidden="true"></span>
                    </button>
                </div>
                <ul class="aside-catalog__sub" id="aside-catalog-sub-entrance">
                    <li><a href="{{ route('street_doors') }}">Улица</a></li>
                    <li><a href="{{ route('apartment_doors') }}">Квартира</a></li>
                    <li><a href="{{ route('thermal_break_doors') }}">Терморазрыв</a></li>
                </ul>
            </li>
            <li class="aside-catalog__item" data-aside-catalog-item>
                <div class="aside-catalog__row">
                    <a class="aside-catalog__parent" href="{{ route('interior_doors') }}"><span>Межкомнатные</span></a>
                    <button type="button" class="aside-catalog__toggle" aria-expanded="false"
                            aria-controls="aside-catalog-sub-interior"
                            aria-label="Подразделы: межкомнатные двери">
                        <span class="aside-catalog__toggle-icon" aria-hidden="true"></span>
                    </button>
                </div>
                <ul class="aside-catalog__sub" id="aside-catalog-sub-interior">
                    <li><a href="{{ route('eco_veneer_doors') }}">Экошпон</a></li>
                    <li><a href="{{ route('polypropylene_doors') }}">Полипропилен</a></li>
                    <li><a href="{{ route('enamel_doors') }}">Эмаль</a></li>
                    <li><a href="{{ route('hidden_doors') }}">Скрытые</a></li>
                    <li><a href="{{ route('solid_doors') }}">Массив</a></li>
                </ul>
            </li>
            <li class="aside-catalog__item" data-aside-catalog-item>
                <div class="aside-catalog__row">
                    <a class="aside-catalog__parent" href="{{ route('fittings') }}"><span>Фурнитура</span></a>
                    <button type="button" class="aside-catalog__toggle" aria-expanded="false"
                            aria-controls="aside-catalog-sub-fittings"
                            aria-label="Подразделы: фурнитура">
                        <span class="aside-catalog__toggle-icon" aria-hidden="true"></span>
                    </button>
                </div>
                <ul class="aside-catalog__sub" id="aside-catalog-sub-fittings">
                    <li><a href="{{ route('economy_fittings') }}">Эконом сегмент</a></li>
                    <li><a href="{{ route('standard_fittings') }}">Стандарт сегмент</a></li>
                    <li><a href="{{ route('premium_fittings') }}">Премиум сегмент</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
<style>
    #aside-catalog-nav.aside-catalog {
        position: relative;
    }

    .aside-catalog__list {
        list-style: none;
        margin: 0;
        padding: 0 0 0 10px;
    }

    .aside-catalog__item {
        position: relative;
        margin: 0;
        padding: 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .aside-catalog__item:last-child {
        border-bottom: none;
    }

    .aside-catalog__row {
        display: flex;
        align-items: center;
        gap: 6px;
        min-height: 36px;
    }

    .aside-catalog__parent {
        flex: 1;
        color: #666;
        font-size: 14px;
        line-height: 25px;
        text-transform: capitalize;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .aside-catalog__parent span {
        display: block;
    }

    .aside-catalog__parent:hover,
    .aside-catalog__parent:focus {
        color: #c8a165;
        outline: none;
    }

    .aside-catalog__toggle {
        flex-shrink: 0;
        width: 36px;
        height: 36px;
        margin: 0;
        padding: 0;
        border: none;
        background: transparent;
        cursor: pointer;
        color: #666;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: color 0.3s ease;
        touch-action: manipulation;
        -webkit-tap-highlight-color: transparent;
    }

    .aside-catalog__toggle:hover,
    .aside-catalog__toggle:focus-visible {
        color: #c8a165;
        outline: none;
    }

    .aside-catalog__toggle-icon {
        display: block;
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 6px solid currentColor;
        transition: transform 0.25s ease;
    }

    .aside-catalog__item.is-open .aside-catalog__toggle-icon {
        transform: rotate(180deg);
    }

    .aside-catalog__sub {
        list-style: none;
        margin: 0 0 0 2px;
        padding: 2px 0 10px 14px;
        border-left: 2px solid #f0ebe4;
    }

    .aside-catalog__sub li {
        margin: 0;
        padding: 0;
    }

    .aside-catalog__sub a {
        display: block;
        color: #999;
        font-size: 13px;
        line-height: 25px;
        text-transform: capitalize;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .aside-catalog__sub a:hover,
    .aside-catalog__sub a:focus {
        color: #c8a165;
        outline: none;
    }

    /* Тач / узкая колонка: подпункты по кнопке */
    @media (max-width: 991px), (hover: none) {
        .aside-catalog__toggle {
            display: flex;
        }

        .aside-catalog__sub {
            display: none;
            position: static;
            padding-bottom: 12px;
        }

        .aside-catalog__item.is-open .aside-catalog__sub {
            display: block;
        }
    }

    /* Десктоп: подпункты по hover/focus-within на строке; стрелка — индикатор (не клик), подсветка как у раскрытия */
    @media (min-width: 992px) and (hover: hover) {
        .aside-catalog__toggle {
            pointer-events: none;
            cursor: default;
        }

        .aside-catalog__item:hover .aside-catalog__toggle,
        .aside-catalog__item:focus-within .aside-catalog__toggle {
            color: #c8a165;
        }

        .aside-catalog__sub {
            display: none;
            position: static;
        }

        .aside-catalog__item:hover .aside-catalog__sub,
        .aside-catalog__item:focus-within .aside-catalog__sub {
            display: block;
        }

        .aside-catalog__item:hover .aside-catalog__toggle-icon,
        .aside-catalog__item:focus-within .aside-catalog__toggle-icon {
            transform: rotate(180deg);
        }
    }
</style>
<script>
    (function () {
        var root = document.getElementById('aside-catalog-nav');
        if (!root || root.dataset.asideCatalogInit === '1') return;
        root.dataset.asideCatalogInit = '1';

        function toggleMode() {
            return window.matchMedia('(max-width: 991px), (hover: none)').matches;
        }

        function setToggleDesktopTabindex() {
            var desktop = !toggleMode();
            root.querySelectorAll('.aside-catalog__toggle').forEach(function (btn) {
                if (desktop) {
                    btn.setAttribute('tabindex', '-1');
                } else {
                    btn.removeAttribute('tabindex');
                }
            });
        }

        function closeAll() {
            root.querySelectorAll('[data-aside-catalog-item]').forEach(function (li) {
                li.classList.remove('is-open');
                var b = li.querySelector('.aside-catalog__toggle');
                if (b) b.setAttribute('aria-expanded', 'false');
            });
        }

        root.querySelectorAll('.aside-catalog__toggle').forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                if (!toggleMode()) return;
                var li = btn.closest('[data-aside-catalog-item]');
                if (!li) return;
                var willOpen = !li.classList.contains('is-open');
                if (willOpen) {
                    root.querySelectorAll('[data-aside-catalog-item]').forEach(function (other) {
                        if (other !== li) {
                            other.classList.remove('is-open');
                            var ob = other.querySelector('.aside-catalog__toggle');
                            if (ob) ob.setAttribute('aria-expanded', 'false');
                        }
                    });
                }
                li.classList.toggle('is-open', willOpen);
                btn.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
            });
        });

        document.addEventListener('click', function () {
            if (toggleMode()) closeAll();
        });

        root.addEventListener('click', function (e) {
            e.stopPropagation();
        });

        setToggleDesktopTabindex();
        window.addEventListener('resize', function () {
            setToggleDesktopTabindex();
            if (!toggleMode()) closeAll();
        });
    })();
</script>
