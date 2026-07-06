@extends('layouts.avi-dveri.avi-dveri')

@section('content')
    <div class="heading-banner-area overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h1>О компании</h1>
                        </div>
                        <div class="breadcumbs pb-15">
                            <ul>
                                <li><a href="{{ route('home') }}">Главная</a></li>
                                <li>О компании</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-us-area pt-80 pb-80">
        <div class="container">
            <div class="contact-us customer-login bg-white p-30">
                <article class="about-content">
                    <section class="about-section">
                        <p>Компания АВИ-двери была основана в 2004 году как ответ на растущий спрос на качественные, надежные и эстетичные решения для жилых и коммерческих помещений. С первых дней работы мы поставили перед собой задачу сделать процесс выбора и покупки дверей максимально простым, понятным и удобным для клиента.</p>
                    </section>

                    <section class="about-section">
                        <h2 class="about-section__title tab-title title-border">Наша цель</h2>
                        <p>Главная цель АВИ-двери — предоставить клиентам качественные двери и фурнитуру, полностью соответствующие современным требованиям безопасности, дизайна и долговечности.</p>
                    </section>

                    <section class="about-section">
                        <h2 class="about-section__title tab-title title-border">Наши принципы</h2>
                        <ul>
                            <li><strong>Качество</strong> — мы предлагаем только проверенную продукцию от надежных производителей.</li>
                            <li><strong>Честность</strong> — прозрачные условия сотрудничества и честные цены без скрытых платежей.</li>
                            <li><strong>Ответственность</strong> — соблюдение сроков и гарантийных обязательств.</li>
                            <li><strong>Клиентоориентированность</strong> — внимательное отношение к каждому заказу и индивидуальный подход.</li>
                        </ul>
                    </section>

                    <section class="about-section">
                        <p>За годы работы мы помогли сотням клиентов подобрать качественные входные и межкомнатные двери для квартир, домов, офисов и коммерческих помещений. Компания выстроила надежные партнерские отношения с проверенными поставщиками и производителями, благодаря чему предлагает качественную продукцию и актуальные решения для любого интерьера.</p>
                        <p>Доверие клиентов стало результатом внимательного подхода к каждому заказу, высокого уровня сервиса и ответственного отношения к своей работе. Компания продолжает развиваться и расширять ассортимент, чтобы предлагать клиентам еще больше возможностей для создания комфортного пространства.</p>
                    </section>

                    <section class="about-section">
                        <h2 class="about-section__title tab-title title-border">Сотрудничество с нашей компанией — это</h2>
                        <ul>
                            <li>Широкий ассортимент — двери и фурнитура на любой вкус и бюджет</li>
                            <li>Комплексный подход — от подбора до возможности установки «под ключ»</li>
                            <li>Профессиональная консультация — помощь в выборе оптимального решения</li>
                            <li>Гарантия качества — вся продукция сертифицирована и соответствует стандартам</li>
                            <li>Гибкие условия оплаты — удобные способы расчета</li>
                            <li>Соблюдение сроков — четкая организация всех этапов работ</li>
                            <li>Индивидуальный подход — решения под задачи каждого клиента</li>
                        </ul>
                        <p>Мы уверены: правильная дверь — это важная часть любого интерьера. Мы поможем вам найти лучшее решение и сделаем всё, чтобы покупка была простой, выгодной и комфортной.</p>
                    </section>

{{--                    <section class="about-section">--}}
{{--                        <h2 class="about-section__title tab-title title-border">Сертификаты</h2>--}}
{{--                        <div class="row">--}}
{{--                            @for($i = 0; $i < 3; $i++)--}}
{{--                                <div class="col-sm-4 col-xs-12 mb-20">--}}
{{--                                    <div class="about-gallery-placeholder">--}}
{{--                                        <span>Фото будет добавлено</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endfor--}}
{{--                        </div>--}}
{{--                    </section>--}}

{{--                    <section class="about-section">--}}
{{--                        <h2 class="about-section__title tab-title title-border">Фото офиса</h2>--}}
{{--                        <div class="row">--}}
{{--                            @for($i = 0; $i < 3; $i++)--}}
{{--                                <div class="col-sm-4 col-xs-12 mb-20">--}}
{{--                                    <div class="about-gallery-placeholder">--}}
{{--                                        <span>Фото будет добавлено</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endfor--}}
{{--                        </div>--}}
{{--                    </section>--}}
                </article>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .about-content p {
            margin: 0 0 1.1em;
        }

        .about-content p:last-child {
            margin-bottom: 0;
        }

        .about-section + .about-section {
            margin-top: 2em;
        }

        .about-content .about-section__title {
            margin: 0 0 0.85em;
            padding: 0;
        }

        .about-content ul {
            margin: 0 0 1.1em;
            padding-left: 1.35em;
            list-style: disc;
        }

        .about-content ul:last-child {
            margin-bottom: 0;
        }

        .about-content li + li {
            margin-top: 0.55em;
        }

        .about-content li strong {
            color: #333;
            font-weight: 700;
        }

        .about-gallery-placeholder {
            background: #e8e8e8;
            min-height: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
            border-radius: 4px;
            font-size: 15px;
        }
    </style>
@endpush
