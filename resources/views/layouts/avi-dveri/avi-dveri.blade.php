<!doctype html>
<html class="no-js" lang="ru">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TCM9F2TW');</script>
    <!-- End Google Tag Manager -->

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $metaTitle ?? 'АВИ-двери' }}</title>
    <meta name="description" content="{{ $metaDescription ?? '' }}">
    @if(!empty($canonicalUrl))
        <link rel="canonical" href="{{ $canonicalUrl }}">
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/, 'js');</script>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/avi-dveri_assets/avi-dveri/img/logo/logo_1.webp')}}">
    <!-- Place favicon.ico in the root directory -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&amp;display=swap" rel="stylesheet">

    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/css/bootstrap.min.css?v=1.6')}}">
    @if(request()->routeIs('home'))
    <!-- animate css (WOW на главной) -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/css/animate.min.css?v=1.6')}}">
    @endif
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/css/meanmenu.min.css?v=1.6')}}">
    @if(request()->routeIs('home'))
    <!-- nivo-slider css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/lib/css/nivo-slider.css?v=1.6')}}">
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/lib/css/preview.css?v=1.6')}}">
    @endif
    <!-- slick css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/css/slick.min.css?v=1.6')}}">
    @if(request()->routeIs('product_page'))
    <!-- lightbox css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/css/lightbox.min.css?v=1.6')}}">
    @endif
    <!-- material-design-iconic-font css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/css/material-design-iconic-font.css?v=1.6')}}">
    <!-- All common css of theme -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/css/default.css?v=1.6')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/style.min.css?v=1.6')}}">
    <!-- shortcode css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/css/shortcode.css?v=1.6')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/css/responsive.css?v=1.6')}}">
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/css/content-typography.css??v=1.6')}}">
    @include('includes.avi-dveri.product_availability_styles')
    @stack('styles')
    @yield('404')
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TCM9F2TW"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- WRAPPER START -->
<div class="wrapper bg-dark-white">
    <header class="header">
        <div class="header-inner">
            <a class="header-brand" href="{{route('home')}}">
                <img src="{{asset('/avi-dveri_assets/avi-dveri/img/logo/logo.webp')}}" alt="Ави-двери">
            </a>
            <nav class="header-nav" aria-label="Основное меню">
                <a class="header-menu" href="{{route('home')}}">Главная</a>
                <a class="header-menu" href="{{route('catalog')}}">Каталог</a>
                <a class="header-menu" href="{{route('about')}}">О компании</a>
                <a class="header-menu" href="{{route('warranty')}}">Гарантия</a>
                <a class="header-menu" href="{{route('promotions')}}">Акции</a>
                <a class="header-menu" href="{{route('payment_and_delivery')}}">Оплата и доставка</a>
                <a class="header-menu" href="{{route('contacts')}}">Контакты</a>
            </nav>
            <div class="header-tools">
                <a class="header-phone" href="tel:375293673518">+375 (29) 367-35-18</a>
                <button type="button" class="button-one submit-btn-4 open_popup_callback" data-text="Заказать звонок">Заказать звонок</button>
            </div>
            <div class="header-search">
                @livewire('search')
            </div>
        </div>
    </header>
    <!-- Mobile-menu start -->
    <div class="mobile-menu-area">
        <div class="container-fluid">
            <a class="header-logo-link mobile-header__logo" href="{{route('home')}}"><img src="{{asset('/avi-dveri_assets/avi-dveri/img/logo/logo2.webp')}}" alt="Ави-двери" loading="lazy" decoding="async"></a>
            <div class="row mobile-header__row">
                <div class="col-xs-12 site-header-mobile-wrap">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                <li><a href="{{route('home')}}">Главная</a></li>
                                <li><a href="{{route('catalog')}}">Каталог</a></li>
                                <li><a href="{{route('about')}}">О компании</a></li>
                                <li><a href="{{route('warranty')}}">Гарантия</a></li>
                                <li><a href="{{route('promotions')}}">Акции</a></li>
                                <li><a href="{{route('payment_and_delivery')}}">Оплата и доставка</a></li>
                                <li><a href="{{route('contacts')}}">Контакты</a></li>
                                <li><a href="tel:375293673518">+375 (29) 367-35-18</a></li>
                                <li><a class="header-menu" href="tel:375333943324">+375 (33) 394-33-24</a></li>
                                <li><a href="#" class="open_popup_callback">Заказать звонок</a></li>
                                <li><a href="#" class="mobile-search-open">Поиск</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile-menu end -->
    <div class="mobile-search-modal" id="mobileSearchModal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="mobileSearchModalTitle">
        <div class="popup__body popup__body_mobile_search">
            <div class="mobile-search-modal__panel">
                <div class="mobile-search-modal__header form__text">
                    <p id="mobileSearchModalTitle" class="title-1 title-border text-uppercase mb-0">Поиск</p>
                    <div class="popup__cross_mobile_search" data-mobile-search-close role="button" tabindex="0" aria-label="Закрыть">✕</div>
                </div>
                <div class="mobile-search-modal__body">
                    @livewire('search', key('mobile-menu-search'))
                </div>
            </div>
        </div>
    </div>
    @if(!isset($is404))
        <x-callback-form />
    @endif
    @if(!isset($is404) && !request()->routeIs('contacts'))
        <x-feedback-form />
    @endif
    @yield('content')
<!-- FOOTER START -->
<footer>
    <!-- Footer-area start -->
    <div class="footer-area footer-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-footer">
                        <h3 class="footer-title  title-border">Контакты</h3>
                        <ul class="footer-contact">
                            <li><span>Адрес :</span>223232, Республика Беларусь, Минская область, г. Червень, ул. Минская, д. 15</li>
                            <li><span>Номер телефона :</span>
                                <a href="tel:375293673518">+375 (29) 367-35-18</a><br>
                                <a href="tel:375333943324">+375 (33) 394-33-24</a><br>
                                <a href="tel:375336846065">+375 (33) 684-60-65</a>
                            </li>
                            <li><span>Email :</span>
                                <a href="mailto:3673518@mail.ru">3673518@mail.ru</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="single-footer">
                        <h3 class="footer-title  title-border">Меню</h3>
                        <ul class="footer-menu">
                            <li><a href="{{route('home')}}"><i class="zmdi zmdi-dot-circle"></i>Главная</a></li>
                            <li><a href="{{route('catalog')}}"><i class="zmdi zmdi-dot-circle"></i>Каталог</a></li>
                            <li><a href="{{route('about')}}"><i class="zmdi zmdi-dot-circle"></i>О компании</a></li>
                            <li><a href="{{route('warranty')}}"><i class="zmdi zmdi-dot-circle"></i>Гарантия</a></li>
                            <li><a href="{{route('promotions')}}"><i class="zmdi zmdi-dot-circle"></i>Акции</a></li>
                            <li><a href="{{route('payment_and_delivery')}}"><i class="zmdi zmdi-dot-circle"></i>Оплата и доставка</a></li>
                            <li><a href="{{route('contacts')}}"><i class="zmdi zmdi-dot-circle"></i>Контакты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 footer-text">
                    <p><br><br>Цены и информация, представленные на данном сайте, приведены в ознакомительных целях, не являются публичной офертой и могут быть изменены.</p>
                    <p>ИП Исаев Андрей Владимирович, УНП 690311744, свидетельство о государственной регистрации №0870887 от 15.12.2022 г. Регистрация в Торговом реестре Республики Беларусь №690311744 от 15.11.2004 г.</p>
                    <p>По вопросам покупателей о защите их прав:<br><a href="tel:375293673518">+375 (29) 367-35-18</a><br><a href="mailto:3673518@mail.ru">3673518@mail.ru</a></p>
                    <p>Контакты лиц, уполномоченных рассматривать обращения покупателей о нарушении их прав (Червеньский районный исполнительный комитет, отдел торговли и услуг).
                        <br><a href="tel:375171428229">(801714) 282-29</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-area end -->
    <!-- Copyright-area start -->
    <div class="copyright-area copyright-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>© 2004-2026 АВИ-двери — магазин дверей и дверной фурнитуры.</p>
                        <p class="mb-0">Developed by <a href="https://t.me/ArtemiSevostian" target="_blank" rel="nofollow noopener noreferrer">Artemi Sevostian</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright-area start -->
</footer>
<!-- FOOTER END -->
</div>
<!-- WRAPPER END -->

<!-- all js here -->
<!-- jquery latest version -->
<script src="https://www.google.com/recaptcha/api.js?render={{config('services.recaptcha.site_key')}}" async></script>
<script>
    {{--function onClick(e) {--}}
    {{--    e.preventDefault();--}}
    {{--    grecaptcha.ready(function () {--}}
    {{--        grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {action: 'send_mail'}).then(function (token) {--}}
    {{--            document.getElementById('g-recaptcha-response').value = token;--}}
    {{--            document.getElementById('mail_form').submit();--}}
    {{--        });--}}
    {{--    });--}}
    {{--}--}}

    async function onClick(e) {
        e.preventDefault();
        const form = e.target.closest('form.mail_form');
        if (!form) {
            return;
        }
        try {
            // Получаем токен reCAPTCHA
            const token = await new Promise((resolve, reject) => {
                grecaptcha.ready(async () => {
                    try {
                        const token = await grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {
                            action: 'send_mail'
                        });
                        resolve(token);
                    } catch (error) {
                        reject(error);
                    }
                });
            });

            const recaptchaField = form.querySelector('[name="g-recaptcha-response"]');
            if (recaptchaField) {
                recaptchaField.value = token;
            }

            const formData = new FormData(form);

            const response = await fetch('/send_mail', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.getElementsByName('_token')[0].value
                }
            });

            const data = await response.json();

            if (!response.ok) {
                if (response.status === 422 && data.errors) {
                    showErrors(data.errors, form);
                } else {
                    // Другие ошибки
                    throw new Error(data.message || 'Произошла ошибка при отправке');
                }
                return;
            }

            // Успешная отправка
            // alert(data.message || 'Письмо успешно отправлено!');
            const currentUrl = window.location.href;
            window.location.href = `/spasibo?referrer=${encodeURIComponent(currentUrl)}`;
            form.reset(); // Сброс формы
            clearErrors(form);

        } catch (error) {
            // Обработка ошибок
            console.error('Ошибка:', error);
            alert(error.message || 'Произошла ошибка при отправке письма');
        }
    }

    // Функция для отображения ошибок
    function showErrors(errors, form) {
        clearErrors(form);

        Object.entries(errors).forEach(([field, messages]) => {
            const root = form || document;
            const inputOrTextarea = root.querySelector(`input[name="${field}"], textarea[name="${field}"]`);

            if (inputOrTextarea) {
                // Находим контейнер для ошибок
                const errorContainer = inputOrTextarea.closest('.feedback__input')?.querySelector('.form_error');

                if (errorContainer) {
                    // Вставляем сообщения об ошибках
                    errorContainer.innerHTML = messages.map(message =>
                        `<div class="text-danger">${message}</div>`).join('');
                }
            }
        });
    }

    // Функция для очистки ошибок
    function clearErrors(form) {
        const root = form || document;
        root.querySelectorAll('.form_error').forEach(el => el.innerHTML = '');
    }
</script>
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/vendor/jquery-3.6.0.min.js')}}" defer></script>
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/vendor/jquery-migrate-3.3.2.min.js')}}" defer></script>
<!-- bootstrap js -->
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/bootstrap.bundle.min.js')}}" defer></script>
<!-- jquery.meanmenu js -->
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/jquery.meanmenu.js')}}" defer></script>
<!-- slick.min js -->
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/slick.min.js')}}" defer></script>
@if(request()->routeIs('product_page'))
<!-- lightbox.min js -->
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/lightbox.min.js')}}" defer></script>
@endif
@if(request()->routeIs('home'))
<!-- jquery.nivo.slider js -->
<script src="{{asset('/avi-dveri_assets/avi-dveri/lib/js/jquery.nivo.slider.js')}}" defer></script>
<script src="{{asset('/avi-dveri_assets/avi-dveri/lib/home.js')}}" defer></script>
<!-- wow js -->
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/wow.min.js')}}" defer></script>
@endif
<!-- plugins js -->
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/plugins.js')}}" defer></script>
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/productCardImagesSlider.js?v=1.2')}}" defer></script>
<!-- main js -->
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/main.min.js')}}" defer></script>
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/mobileSearchModal.js?v=1.2')}}" defer></script>

<script src="{{asset('/avi-dveri_assets/avi-dveri/js/popupSubmitApplication.js')}}" defer></script>
@if(request()->routeIs('product_page'))
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/imagePrice.js')}}" defer></script>
@endif
@if(request()->routeIs('home'))
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/homeBenefitsMarquee.js')}}" defer></script>
@endif
@stack('scripts')
</body>
</html>
