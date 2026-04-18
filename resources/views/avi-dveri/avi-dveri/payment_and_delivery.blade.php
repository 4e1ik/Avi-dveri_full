@extends('layouts.avi-dveri.avi-dveri')

@section('content')
    <!-- HEADING-BANNER START -->
    <div class="heading-banner-area overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h1>Оплата и доставка</h1>
                        </div>
                        <div class="breadcumbs pb-15">
                            <ul>
                                <li><a href="{{route('home')}}">Главная</a></li>
                                <li>Оплата и доставка</li>
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
                                    <div style="display: flex; gap: 1em; flex-wrap: wrap;" class="pickup-text">
                                        <p class="tab-title title-border mb-30">Самовывоз:</p>
                                        <p style="margin-top: auto">Минская обл., г. Червень, ул. Минская, 15</p>
                                    </div>
                                    <p class="tab-title title-border mb-30">Условия доставки входных и межкомнатных дверей</p>
                                    <p>доставка дверей в пределах МКАД – 30 руб;</p>
                                    <p>доставка до 30 км от МКАД – 30 руб.+ 1 руб/км;</p>
                                    <p>доставка до 30 км от МКАД на сумму от 1200 руб. - бесплатно ;</p>
                                    <p class="tab-title title-border mb-30">Доставка осуществляется до подъезда (калитки). Замер и установка дверей оговариваются с консультантом.</p>
                                    <p class="tab-title title-border mb-30">При доставке проверяется комплектность заказа, целостность товара, подписывается акт передачи товара.</p>
                                </div>
                            </div>
                            <div class="tab-pane active" id="delivery">
                                <div class="pro-tab-info pro-reviews">
                                    <div class="customer-review mb-60">
                                        <p class="tab-title title-border mb-30">Условия оплаты</p>
                                        <img src="{{asset('/avi-dveri_assets/avi-dveri/img/KSA.jpg')}}"
                                             alt="Картинка оплата">
                                        <p class="tab-title title-border mb-30">Условия оплаты</p>
                                        <p>⦾ Оплата производится только в белорусских рублях.</p>
                                        <p>⦾ Аванс в размере 30-50% от стоимости заказа.</p>
                                    </div>
                                    <p>Для вашего удобства мы предлагаем несколько вариантов оплаты:</p>
                                    <p class="tab-title title-border mb-30">Наличный расчет</p>
                                    <p>Вы оплачиваете вышеуказанный аванс наличными. После проверки комплектности и
                                        качества товаров оплачиваете остаток. При оплате вы получаете кассовый чек,
                                        который является основанием для замены и возврата товара.</p>
                                    <p class="tab-title title-border mb-30">Банковскими картами</p>
                                    <p>Принимаем к оплате платежные карты Белкарт, Visa, MasterCard (оплата через
                                        терминал). При оплате банковской картой возврат денежных средств в случае такой
                                        необходимости осуществляется на карточку, с которой была произведена оплата.</p>
                                    <img src="{{asset('/avi-dveri_assets/avi-dveri/img/oplata_bankovskoy_kartoy_onlayn.png')}}"
                                         alt="Картинка оплаты картами">
{{--                                    <p class="tab-title title-border mb-30">Оплата через ЕРИП</p>--}}
                                    <p class="tab-title title-border mb-30">Безналичный расчет</p>
                                    <p class="tab-title title-border mb-30">В рассрочку</p>
                                    <p>от магазина до 3-х мес. без %.</p>
                                    <p>красная карта от Альфа-Банка до 12 мес.</p>
                                    <p>рассрочка от Альфа-Банка до 5-х мес. 1%.</p>
                                    <p class="tab-title title-border mb-30">В кредит</p>
                                    <p>кредит от Альфа-Банка до 12 мес. под 11,9%.</p>
                                    <p>кредит от Беларусбанк «На родныя тавары» до 2-х лет под 4%</p>
{{--                                    <img src="{{asset('/avi-dveri_assets/avi-dveri/img/vaerrr.jpg')}}" alt="Картинка карты">--}}
                                    <p class="tab-title title-border mb-30">Образец чека</p>
                                    <a download="Образец чека" href="{{asset('/avi-dveri_assets/avi-dveri/img/20250314_162645.jpg')}}">Нажмите, чтобы скачать образец чека</a>
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