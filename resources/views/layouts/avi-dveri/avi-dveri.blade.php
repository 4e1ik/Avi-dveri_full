<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>АВИдвери</title>
    <meta name="description" content="Hurst – Furniture Store eCommerce HTML Template is a clean and elegant design – suitable for selling flower, cookery, accessories, fashion, high fashion, accessories, digital, kids, watches, jewelries, shoes, kids, furniture, sports….. It has a fully responsive width adjusts automatically to any screen size or resolution.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/avi-dveri_assets/avi-dveri/img/logo/logo_1.png')}}">
    <!-- Place favicon.ico in the root directory -->

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>

    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/css/bootstrap.min.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/css/animate.min.css')}}">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/css/jquery-ui.min.css')}}">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/css/meanmenu.min.css')}}">
    <!-- nivo-slider css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/lib/css/nivo-slider.css')}}">
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/lib/css/preview.css')}}">
    <!-- slick css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/css/slick.min.css')}}">
    <!-- lightbox css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/css/lightbox.min.css')}}">
    <!-- material-design-iconic-font css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/css/material-design-iconic-font.css')}}">
    <!-- All common css of theme -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/css/default.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/style.min.css')}}">
    <!-- shortcode css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/css/shortcode.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/avi-dveri/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('/avi-dveri_assets/avi-dveri/js/vendor/modernizr-3.11.2.min.js')}}"></script>
</head>
<body>
<!-- WRAPPER START -->
<div class="wrapper bg-dark-white">
    <header class="header">
        <a class="header-brand" href="{{route('home')}}">
            <img src="{{asset('/avi-dveri_assets/avi-dveri/img/logo/logo.png')}}" alt="Ави-двери">
        </a>
        <a class="header-menu" href="{{route('home')}}">Главная</a>
        <a class="header-menu" href="{{route('catalog')}}">Каталог</a>
        <a class="header-menu" href="{{route('payment_and_delivery')}}">Оплата и доставка</a>
        <a class="header-menu" href="80293673518" style="font-size: 0.9em; margin: 1.5em 0 0 0">+375 (29) 367-35-18</a>
        @livewire('search')

{{--        <form class="d-flex" id="search-form">--}}
{{--            <input id="search-input" class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">--}}

{{--            <a class="search-img" href="#" onclick="performSearch(event)">--}}
{{--                <img type="submit" src="{{ asset('/avi-dveri_assets/avi-dveri/img/search.png') }}" alt="" width="30" height="30">--}}
{{--            </a>--}}
{{--        </form>--}}
        <div id="search-results" style="margin-top: 20px;">
            <!-- Здесь будут отображаться результаты -->
        </div>
    </header>
    <!-- Mobile-menu start -->
    <div class="mobile-menu-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 d-block d-md-none">
                    <div class="mobile-menu">
                        <a class="header-logo-link" href="{{route('home')}}"><img src="{{asset('/avi-dveri_assets/avi-dveri/img/logo/logo2.png')}}" alt="Ави-двери"></a>
                        <nav id="dropdown">
                            <ul>
                                <li><a href="{{route('home')}}">Главная</a></li>
                                <li><a href="{{route('catalog')}}">Каталог</a></li>
                                <li><a class="header-menu" href="{{route('payment_and_delivery')}}">Оплата и доставка</a></li>
                                <li><a class="header-menu" href="80293673518">+375 (29) 367-35-18</a></li>
                                <li><a class="header-menu" href="80333943324">+375 (33) 394-33-24</a></li>
                                <li>@livewire('search')</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile-menu end -->
    <!-- popup -->
    <Style>
        .popup_application {
            display: none;
            width: 100%;
            height: 100%;
            position: fixed;
            background: rgba(151, 151, 151, 0.05);
            backdrop-filter: blur(4px);
            -webkit-background: rgba(151, 151, 151, 0.05);
            -webkit-backdrop-filter: blur(4px);
            top: 0;
            left: 0;
            overflow-y: auto;
            overflow-x: hidden;
            z-index: 99;
        }

        .popup__body {
            min-height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 8.125em;
        }

        #contact-form {
            background-color: #c7c2c2;
            padding: 10px;
            border-radius: 10px;
        }

        .form__text>h4 {
            color:#5b3a29
        }

        .popup__cross_application{
            cursor: pointer;
            font-size: large;
            transition: 0.2s;
        }

        .popup__cross_application:hover{
            transform: scale(1.2);
        }
    </Style>
    <div class="send-message popup_application">
        <div class="popup__body popup__body_application">
            <form id="contact-form" action="#">
                <div class="form__text">
                    <h4 class="title-1 title-border text-uppercase mb-30">Отправить заявку</h4>
                    <div class="popup__cross_application" href="">✕</div>
                </div>
                <input type="text" name="con_name" placeholder="Имя" />
                <input type="text" name="con_email" placeholder="E-mail" />
                <textarea class="custom-textarea" name="con_message" placeholder="Текст сообщения"></textarea>
                <button class="button-one submit-button mt-20" data-text="Отправить" type="">Отправить</button>
                <p class="form-message"></p>
            </form>
        </div>
    </div>
    <!-- end popup -->
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
                            <li><span>Адрес :</span>ул. Минская, 15<br>Минская область, г. Червень</li>
                            <li><span>Номер телефона :</span>
                                <a href="80293673518">+375 (29) 367-35-18</a><br>
                                <a href="80333943324">+375 (33) 394-33-24</a><br>
                                <a href="80336846065">+375 (33) 684-60-65</a>
                            </li>
                            <li><span>Email :</span>
                                <a href="mailto:your-email@gmail.com">your-email@gmail.com</a>
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
                            <li><a href="{{route('payment_and_delivery')}}"><i class="zmdi zmdi-dot-circle"></i>Оплата и доставка</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-text">
                    <p><br><br>Цены и информация, представленные на данном сайте, приведены в ознакомительных целях, не являются публичной офертой и могут быть изменены.</p>
                    <p>ИП Исаев Андрей Владимирович, УНП 690311744, свидетельство о государствееной регистрации №0870887 от 15.12.2022 г. Регистрация в Торговом реестре Республики Беларусь №690311744 от 15.11.2004 г.</p>
                    <p>По вопросам покупателей о защите их прав:<br><a href="80293673518">+375 (29) 367-35-18</a><br><a href="mailto:your-email@gmail.com">your-email@gmail.com</a></p>
                    <p>Контакты лиц, уполномоченных рассматривать обращения покупателей о нарушении их прав (Червеньский районный исполнительный комитет, отдел торговли и услуг).
                        <br><a href="80171428229">(801714) 282-29</a>
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
                <div class="col-md-6">
                    <div class="copyright">
                        <p class="mb-0">&copy; <a href="" target="_blank">Artemy Sevostian </a> 2024. All Rights Reserved.</p>
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
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/bootstrap.bundle.min.js')}}"></script>
<!-- jquery.meanmenu js -->
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/jquery.meanmenu.js')}}"></script>
<!-- slick.min js -->
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/slick.min.js')}}"></script>
<!-- jquery.treeview js -->
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/jquery.treeview.js')}}"></script>
<!-- lightbox.min js -->
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/lightbox.min.js')}}"></script>
<!-- jquery-ui js -->
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/jquery-ui.min.js')}}"></script>
<!-- jquery.nivo.slider js -->
<script src="{{asset('/avi-dveri_assets/avi-dveri/lib/js/jquery.nivo.slider.js')}}"></script>
<script src="{{asset('/avi-dveri_assets/avi-dveri/lib/home.js')}}"></script>
<!-- jquery.nicescroll.min js -->
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/jquery.nicescroll.min.js')}}"></script>
<!-- countdon.min js -->
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/countdon.min.js')}}"></script>
<!-- wow js -->
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/wow.min.js')}}"></script>
<!-- plugins js -->
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/plugins.js')}}"></script>
<!-- main js -->
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/main.min.js')}}"></script>


<script src="{{asset('/avi-dveri_assets/avi-dveri/js/popupSubmitApplication.js')}}"></script>
<script src="{{asset('/avi-dveri_assets/avi-dveri/js/smartSearch.js')}}"></script>
{{--<script>--}}
{{--    function performSearch(event) {--}}
{{--        event.preventDefault();--}}
{{--        const query = document.getElementById('search-input').value;--}}

{{--        if (!query) {--}}
{{--            alert('Введите запрос для поиска.');--}}
{{--            return;--}}
{{--        }--}}

{{--        fetch(`/search?q=${encodeURIComponent(query)}`)--}}
{{--            .then(response => {--}}
{{--                if (!response.ok) {--}}
{{--                    throw new Error('Ошибка выполнения поиска');--}}
{{--                }--}}
{{--                return response.json();--}}
{{--            })--}}
{{--            .then(data => {--}}
{{--                const resultsContainer = document.getElementById('search-results');--}}
{{--                resultsContainer.innerHTML = '';--}}

{{--                if (data.doors.length) {--}}
{{--                    const doorList = document.createElement('div');--}}
{{--                    doorList.innerHTML = '<h3>Двери</h3>';--}}
{{--                    data.doors.forEach(door => {--}}
{{--                        const item = document.createElement('p');--}}
{{--                        item.textContent = door.title;--}}
{{--                        doorList.appendChild(item);--}}
{{--                    });--}}
{{--                    resultsContainer.appendChild(doorList);--}}
{{--                }--}}

{{--                if (data.fittings.length) {--}}
{{--                    const fittingList = document.createElement('div');--}}
{{--                    fittingList.innerHTML = '<h3>Фитинги</h3>';--}}
{{--                    data.fittings.forEach(fitting => {--}}
{{--                        const item = document.createElement('p');--}}
{{--                        item.textContent = fitting.title;--}}
{{--                        fittingList.appendChild(item);--}}
{{--                    });--}}
{{--                    resultsContainer.appendChild(fittingList);--}}
{{--                }--}}

{{--            })--}}
{{--            .catch(error => {--}}
{{--                alert('Ошибка поиска: ' + error.message);--}}
{{--            });--}}
{{--    }--}}
{{--</script>--}}
{{--@livewireAssets--}}
</body>
</html>
