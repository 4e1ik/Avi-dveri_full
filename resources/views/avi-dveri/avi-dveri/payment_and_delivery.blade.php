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

    </div>
@endsection