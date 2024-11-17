@extends('layouts.avi-dveri.avi-dveri')

@section('content')
    <!-- HEADING-BANNER START -->
    <div class="heading-banner-area overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h2>Оплата и доставка</h2>
                        </div>
                        <div class="breadcumbs pb-15">
                            <ul>
                                <li><a href="{{route('home')}}">Главная</a></li>
                                <li><a href="{{route('payment_and_delivery')}}">Оплата и доставка</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- HEADING-BANNER END -->
    <div class="contact-us-area  pt-80 pb-80">
        <div class="container">
            <div class="contact-us customer-login bg-white">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="single-pro-tab-menu">
                            <!-- Nav tabs -->
                            <ul class="nav d-block">
                                <li><a href="#payment" data-bs-toggle="tab">Доставка</a></li>
                                <li><a class="active" href="#delivery" data-bs-toggle="tab">Оплата</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane" id="payment">
                                <div class="pro-tab-info pro-description">
                                    <h3 class="tab-title title-border mb-30">Условия доставки входных дверей</h3>
                                    <p>доставка входных дверей в пределах МКАД с нашим монтажом БЕСПЛАТНО;</p>
                                    <p>доставка свыше 40 км от МКАД согласовывается индивидуально;</p>
                                    <h3 class="tab-title title-border mb-30">Условия подьема входных дверей</h3>
                                    <p>на первый этаж - бесплатно;</p>
                                    <p>лифт - бесплатно;</p>
                                    <p>начиная со второго этажа 3-х контурная дверь - 5,40 р/этаж;</p>
                                    <p>начиная со второго этажа 2-х контурная дверь - 3,60 р/этаж;</p>
                                    <h3 class="tab-title title-border mb-30">Условия доставки межкомнатных дверей</h3>
                                    <p>в черте города - 10 рублей;</p>
                                    <p>за чертой города - 1 рубль за 1 километр;</p>
                                    <h3 class="tab-title title-border mb-30">Условия подьема межкомнатных дверей</h3>
                                    <p>при наличии лифта - 5 рублей за дверь;</p>
                                    <p>при отсутствии лифта - 5 рублей за этаж (одна дверь);</p>
                                    <p>все бруски из заказа - 0,50 рублей/этаж;</p>
                                </div>
                            </div>
                            <div class="tab-pane active" id="delivery">
                                <div class="pro-tab-info pro-reviews">
                                    <div class="customer-review mb-60">
                                        <h3 class="tab-title title-border mb-30">Оплата</h3>
                                        <img src="{{asset('/avi-dveri_assets/avi-dveri/img/KSA.jpg')}}"
                                             alt="Картинка оплата">
                                        <h3 class="tab-title title-border mb-30">Условия оплаты</h3>
                                        <p>⦾ Оплата производится только в белорусских рублях.</p>
                                        <p>⦾ Аванс в размере 30-50% от стоимости заказа.</p>
                                    </div>
                                    <p>Для вашего удобства мы предлагаем несколько вариантов оплаты:</p>
                                    <h3 class="tab-title title-border mb-30">Наличный расчет</h3>
                                    <p>Вы оплачиваете вышеуказанный аванс наличными. После проверки комплектности и
                                        качества товаров оплачиваете остаток. При оплате вы получаете кассовый чек,
                                        который является основанием для замены и возврата товара.</p>
                                    <h3 class="tab-title title-border mb-30">Банковскими картами</h3>
                                    <p>Принимаем к оплате платежные карты Белкарт, Visa, MasterCard (оплата через
                                        терминал). При оплате банковской картой возврат денежных средств в случае такой
                                        необходимости осуществляется на карточку, с которой была произведена оплата.</p>
                                    <img src="{{asset('/avi-dveri_assets/avi-dveri/img/oplata_bankovskoy_kartoy_onlayn.png')}}"
                                         alt="Картинка оплаты картами">
                                    <h3 class="tab-title title-border mb-30">В рассрочку</h3>
                                    <p>Мы предоставляем возможность выгодного приобретения дверей в рассрочку от 3 до 12
                                        месяцев по картам:</p>
                                    <p>⦾ Халва (МТБ);</p>
                                    <p>⦾ Магнит (Беларусбанк);</p>
                                    <p>⦾ Карта Покупок (Белгазпромбанк);</p>
                                    <p>⦾ Черепаха (ВТБ);</p>
                                    <p>⦾ Партнерская рассрочка (Беларусбанк) для держателей карт;</p>
                                    <p>⦾ Альфа-Банк рассрочка (онлайн-рассрочка).</p>
                                    <p>Также в нашем магазине регулярно проходят акции и действуют скидки для постоянных
                                        клиентов. Внимание: Акции и скидки на приобретаемый товар в рассрочку не
                                        распространяются.</p>
                                    <img src="{{asset('/avi-dveri_assets/avi-dveri/img/vaerrr.jpg')}}"
                                         alt="Картинка карты">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single-product-tab end -->

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
                                    <li><a href="index.html"><i class="zmdi zmdi-dot-circle"></i>Главная</a></li>
                                    <li><a href="catalog.html"><i class="zmdi zmdi-dot-circle"></i>Каталог</a></li>
                                    <li><a href="opl-dos.html"><i class="zmdi zmdi-dot-circle"></i>Оплата и доставка</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-text">
                            <p><br><br>Цены и информация, представленные на данном сайте, приведены в ознакомительных
                                целях, не являются публичной офертой и могут быть изменены.</p>
                            <p>ИП Исаев Андрей Владимирович, УНП 690311744, свидетельство о государствееной регистрации
                                №0870887 от 15.12.2022 г. Регистрация в Торговом реестре Республики Беларусь №690311744
                                от 15.11.2004 г.</p>
                            <p>По вопросам покупателей о защите их прав:<br><a href="80293673518">+375 (29)
                                    367-35-18</a><br><a href="mailto:your-email@gmail.com">your-email@gmail.com</a></p>
                            <p>Контакты лиц, уполномоченных рассматривать обращения покупателей о нарушении их прав
                                (Червеньский районный исполнительный комитет, отдел торговли и услуг).
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
                                <p class="mb-0">&copy; <a href="" target="_blank">Artemy Sevostian </a> 2024. All Rights
                                    Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Copyright-area start -->
        </footer>
        <!-- FOOTER END -->

    </div>
@endsection