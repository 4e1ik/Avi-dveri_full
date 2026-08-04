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
    <div class="about-page">
        <div class="container">
            <div class="about-page__intro">
                <div class="about-page__text">
                    <p class="about-page__lead">Компания АВИ-двери была основана в 2004 году как ответ на растущий спрос на
                        качественные, надежные и эстетичные решения для жилых и коммерческих помещений. С первых дней работы
                        мы поставили перед собой задачу сделать процесс выбора и покупки дверей максимально простым,
                        понятным и удобным для клиента.</p>
                </div>
                <div class="about-page__grid">
                    <div class="about-page__card">
                        <h3 class="about-page__card-title">Наша цель</h3>
                        <p>Предоставить клиентам качественные двери и фурнитуру, полностью соответствующие современным
                            требованиям безопасности, дизайна и долговечности.</p>
                    </div>
                    <div class="about-page__card">
                        <h3 class="about-page__card-title">Наши принципы</h3>
                        <ul class="about-page__card-list">
                            <li><strong>Качество</strong> — только проверенная продукция</li>
                            <li><strong>Честность</strong> — прозрачные цены без скрытых платежей</li>
                            <li><strong>Ответственность</strong> — соблюдение сроков и гарантий</li>
                            <li><strong>Клиентоориентированность</strong> — индивидуальный подход</li>
                        </ul>
                    </div>
                </div>
                <div class="about-page__text">
                    <p>За годы работы мы помогли сотням клиентов подобрать качественные входные и межкомнатные двери для
                        квартир, домов, офисов и коммерческих помещений. Компания выстроила надежные партнерские отношения с
                        проверенными поставщиками и производителями, благодаря чему предлагает качественную продукцию и
                        актуальные решения для любого интерьера.</p>
                    <p>Доверие клиентов стало результатом внимательного подхода к каждому заказу, высокого уровня сервиса и
                        ответственного отношения к своей работе.</p>
                </div>
                <div class="about-page__grid about-page__grid--three">
                    <div class="about-page__stat">
                        <span class="about-page__stat-number">2004</span>
                        <span class="about-page__stat-label">Год основания</span>
                    </div>
                    <div class="about-page__stat">
                        <span class="about-page__stat-number">1000+</span>
                        <span class="about-page__stat-label">Довольных клиентов</span>
                    </div>
                    <div class="about-page__stat">
                        <span class="about-page__stat-number">20+</span>
                        <span class="about-page__stat-label">Лет на рынке</span>
                    </div>
                </div>
                <div class="about-page__text">
                    <h2 class="about-page__subtitle">Сотрудничество с нашей компанией — это</h2>
                    <ul class="about-page__big-list">
                        <li>Широкий ассортимент — двери и фурнитура на любой вкус и бюджет</li>
                        <li>Комплексный подход — от подбора до возможности установки «под ключ»</li>
                        <li>Профессиональная консультация — помощь в выборе оптимального решения</li>
                        <li>Гарантия качества — вся продукция сертифицирована и соответствует стандартам</li>
                        <li>Гибкие условия оплаты — удобные способы расчета</li>
                        <li>Соблюдение сроков — четкая организация всех этапов работ</li>
                        <li>Индивидуальный подход — решения под задачи каждого клиента</li>
                    </ul>
                    <p>Мы уверены: правильная дверь — это важная часть любого интерьера. Мы поможем вам найти лучшее решение
                        и сделаем всё, чтобы покупка была простой, выгодной и комфортной.</p>
                </div>
            </div>

            <!-- ===== СЕРТИФИКАТЫ ===== -->
            <div class="about-page__section">
                <h2 class="about-page__section-title">Сертификаты</h2>
                <div class="about-page__gallery about-page__gallery--certificates" id="certificatesGallery">
                    <div class="about-page__gallery-track" id="certificatesTrack">
                        @php
                            $certificates = [
                                [
                                    'src' => '/avi-dveri_assets/avi-dveri/img/certificates/1.webp',
                                    'alt' => 'Сертификат 1',
                                ],
                                [
                                    'src' => '/avi-dveri_assets/avi-dveri/img/certificates/2.webp',
                                    'alt' => 'Сертификат 2',
                                ],
                                [
                                    'src' => '/avi-dveri_assets/avi-dveri/img/certificates/3.webp',
                                    'alt' => 'Сертификат 3',
                                ],
                                [
                                    'src' => '/avi-dveri_assets/avi-dveri/img/certificates/4.webp',
                                    'alt' => 'Сертификат 4',
                                ],
                            ];
                        @endphp
                        @foreach ($certificates as $cert)
                            <div class="about-page__gallery-item">
                                <div class="about-page__gallery-card">
                                    <div class="about-page__gallery-image">
                                        <span class="about-page__gallery-placeholder">{{ $cert['alt'] }}</span>
                                        <div class="about-page__gallery-overlay">
                                            <span class="about-page__gallery-label">Посмотреть</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="about-page__gallery-btn about-page__gallery-btn--prev" id="certPrev">‹</button>
                    <button class="about-page__gallery-btn about-page__gallery-btn--next" id="certNext">›</button>
                </div>
            </div>

            <!-- ===== ПРИМЕРЫ РАБОТ ===== -->
            <div class="about-page__section">
                <h2 class="about-page__section-title">Примеры работ</h2>
                <div class="about-page__gallery about-page__gallery--works" id="worksGallery">
                    <div class="about-page__gallery-track" id="worksTrack">
                        @php
                            $works = [
                                ['src' => '/avi-dveri_assets/avi-dveri/img/works/1.webp', 'alt' => 'Пример работы 1'],
                                ['src' => '/avi-dveri_assets/avi-dveri/img/works/2.webp', 'alt' => 'Пример работы 2'],
                                ['src' => '/avi-dveri_assets/avi-dveri/img/works/3.webp', 'alt' => 'Пример работы 3'],
                                ['src' => '/avi-dveri_assets/avi-dveri/img/works/4.webp', 'alt' => 'Пример работы 4'],
                                ['src' => '/avi-dveri_assets/avi-dveri/img/works/5.webp', 'alt' => 'Пример работы 5'],
                                ['src' => '/avi-dveri_assets/avi-dveri/img/works/6.webp', 'alt' => 'Пример работы 6'],
                            ];
                        @endphp
                        @foreach ($works as $work)
                            <div class="about-page__gallery-item">
                                <div class="about-page__gallery-card">
                                    <div class="about-page__gallery-image">
                                        <span class="about-page__gallery-placeholder">{{ $work['alt'] }}</span>
                                        <div class="about-page__gallery-overlay">
                                            <span class="about-page__gallery-label">Посмотреть</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="about-page__gallery-btn about-page__gallery-btn--prev" id="workPrev">‹</button>
                    <button class="about-page__gallery-btn about-page__gallery-btn--next" id="workNext">›</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('/avi-dveri_assets/avi-dveri/js/about-page.js') }}" defer></script>
@endpush
