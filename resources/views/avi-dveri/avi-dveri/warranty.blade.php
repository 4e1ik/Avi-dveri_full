@extends('layouts.avi-dveri.avi-dveri')

@section('content')
    <div class="heading-banner-area overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h1>Гарантия</h1>
                        </div>
                        <div class="breadcumbs pb-15">
                            <ul>
                                <li><a href="{{ route('home') }}">Главная</a></li>
                                <li>Гарантия</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-us-area pt-80 pb-80">
        <div class="container">
            <div class="contact-us customer-login bg-white">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="single-pro-tab-menu">
                            <ul class="nav d-block">
                                <li><a class="active" href="#warranty" data-bs-toggle="tab">О гарантии</a></li>
                                <li><a href="#return" data-bs-toggle="tab">Возврат и обмен</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="tab-content">
                            <div class="tab-pane active" id="warranty">
                                <div class="pro-tab-info pro-description">
                                    <p class="tab-title title-border mb-30">О гарантии</p>
                                    <p>На всю реализуемую продукцию распространяется гарантия производителя. Срок гарантии зависит от модели двери или фурнитуры и указывается в сопроводительной документации при покупке.</p>
                                    <p>Гарантия распространяется на заводские дефекты материалов и сборки при соблюдении правил эксплуатации, транспортировки и монтажа.</p>
                                    <p>Гарантийное обслуживание выполняется при предъявлении товарного или кассового чека и заполненного гарантийного талона.</p>
                                    <p>Для консультации по гарантийному случаю свяжитесь с нами по телефону или через форму обратной связи на сайте.</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="return">
                                <div class="pro-tab-info pro-description">
                                    <p class="tab-title title-border mb-30">Возврат и обмен</p>
                                    <p>Возврат и обмен товара надлежащего качества возможен в течение 14 дней с момента покупки, если сохранены товарный вид, потребительские свойства, упаковка и документы.</p>
                                    <p>Товар индивидуального заказа (нестандартный размер, особый декор) возврату не подлежит, если иное не согласовано при оформлении заказа.</p>
                                    <p>Возврат товара ненадлежащего качества осуществляется в соответствии с законодательством Республики Беларусь о защите прав потребителей.</p>
                                    <p>Денежные средства возвращаются тем же способом, которым была произведена оплата (наличный расчет — наличными, безналичный — на карту).</p>
                                    <p>По вопросам возврата и обмена обращайтесь к менеджеру магазина или по контактам, указанным на странице «Контакты».</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
