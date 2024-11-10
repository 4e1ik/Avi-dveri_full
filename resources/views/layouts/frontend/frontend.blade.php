<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>АВИдвери</title>
    <meta name="description" content="Hurst – Furniture Store eCommerce HTML Template is a clean and elegant design – suitable for selling flower, cookery, accessories, fashion, high fashion, accessories, digital, kids, watches, jewelries, shoes, kids, furniture, sports….. It has a fully responsive width adjusts automatically to any screen size or resolution.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/avi-dveri_assets/frontend/img/logo/logo_1.png')}}">
    <!-- Place favicon.ico in the root directory -->

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>

    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/frontend/css/bootstrap.min.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/frontend/css/animate.min.css')}}">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/frontend/css/jquery-ui.min.css')}}">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/frontend/css/meanmenu.min.css')}}">
    <!-- nivo-slider css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/frontend/lib/css/nivo-slider.css')}}">
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/frontend/lib/css/preview.css')}}">
    <!-- slick css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/frontend/css/slick.min.css')}}">
    <!-- lightbox css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/frontend/css/lightbox.min.css')}}">
    <!-- material-design-iconic-font css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/frontend/css/material-design-iconic-font.css')}}">
    <!-- All common css of theme -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/frontend/css/default.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/frontend/style.min.css')}}">
    <!-- shortcode css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/frontend/css/shortcode.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('/avi-dveri_assets/frontend/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('/avi-dveri_assets/frontend/js/vendor/modernizr-3.11.2.min.js')}}"></script>
</head>
<body>
<!-- WRAPPER START -->
<div class="wrapper bg-dark-white">
    <header class="header">
        <a class="header-brand" href="{{route('home')}}">
            <img src="{{asset('/avi-dveri_assets/frontend/img/logo/logo.png')}}" alt="Ави-двери">
        </a>
        <a class="header-menu" href="{{route('home')}}">Главная</a>
        <a class="header-menu" href="{{route('catalog')}}">Каталог</a>
        <a class="header-menu" href="{{route('payment_and_delivery')}}">Оплата и доставка</a>
        <a class="header-menu" href="80293673518" style="font-size: 0.9em; margin: 1.5em 0 0 0">+375 (29) 367-35-18</a>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">
            <a class="search-img" href="#">
                <img src="{{asset('/avi-dveri_assets/frontend/img/search.png')}}" alt="" width="30" height="30" class="d-inline-block align-top" alt="CoreUI Logo">
            </a>
        </form>
    </header>
    <!-- Mobile-menu start -->
    <div class="mobile-menu-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 d-block d-md-none">
                    <div class="mobile-menu">
                        <a class="header-logo-link" href="{{route('home')}}"><img src="{{asset('/avi-dveri_assets/frontend/img/logo/logo2.png')}}" alt="Ави-двери"></a>
                        <nav id="dropdown">
                            <ul>
                                <li><a href="{{route('home')}}">Главная</a></li>
                                <li><a href="{{route('catalog')}}">Каталог</a></li>
                                <li><a class="header-menu" href="{{route('payment_and_delivery')}}">Оплата и доставка</a></li>
                                <li><a class="header-menu" href="80293673518">+375 (29) 367-35-18</a></li>
                                <li><a class="header-menu" href="80333943324">+375 (33) 394-33-24</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile-menu end -->
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
                        <br><a href="80171428229">(8017) 142-82-29</a>
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
<script src="{{asset('/avi-dveri_assets/frontend/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('/avi-dveri_assets/frontend/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('/avi-dveri_assets/frontend/js/bootstrap.bundle.min.js')}}"></script>
<!-- jquery.meanmenu js -->
<script src="{{asset('/avi-dveri_assets/frontend/js/jquery.meanmenu.js')}}"></script>
<!-- slick.min js -->
<script src="{{asset('/avi-dveri_assets/frontend/js/slick.min.js')}}"></script>
<!-- jquery.treeview js -->
<script src="{{asset('/avi-dveri_assets/frontend/js/jquery.treeview.js')}}"></script>
<!-- lightbox.min js -->
<script src="{{asset('/avi-dveri_assets/frontend/js/lightbox.min.js')}}"></script>
<!-- jquery-ui js -->
<script src="{{asset('/avi-dveri_assets/frontend/js/jquery-ui.min.js')}}"></script>
<!-- jquery.nivo.slider js -->
<script src="{{asset('/avi-dveri_assets/frontend/lib/js/jquery.nivo.slider.js')}}"></script>
<script src="{{asset('/avi-dveri_assets/frontend/lib/home.js')}}"></script>
<!-- jquery.nicescroll.min js -->
<script src="{{asset('/avi-dveri_assets/frontend/js/jquery.nicescroll.min.js')}}"></script>
<!-- countdon.min js -->
<script src="{{asset('/avi-dveri_assets/frontend/js/countdon.min.js')}}"></script>
<!-- wow js -->
<script src="{{asset('/avi-dveri_assets/frontend/js/wow.min.js')}}"></script>
<!-- plugins js -->
<script src="{{asset('/avi-dveri_assets/frontend/js/plugins.js')}}"></script>
<!-- main js -->
<script src="{{asset('/avi-dveri_assets/frontend/js/main.min.js')}}"></script>


<script src="{{asset('/avi-dveri_assets/frontend/js/popupSubmitApplication.js')}}"></script>
</body>
</html>
