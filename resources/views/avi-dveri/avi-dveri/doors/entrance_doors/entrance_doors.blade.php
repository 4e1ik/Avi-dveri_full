@extends('layouts.avi-dveri.avi-dveri')

@section('content')
    <!-- HEADING-BANNER START -->
    <div class="heading-banner-area overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h1>Входные двери</h1>
                        </div>
                        <div class="breadcumbs pb-15">
                            <ul>
                                <li><a href="{{ route('home') }}">Главная</a></li>
                                <li><a href="{{ route('catalog') }}">Каталог</a></li>
                                <li>Входные двери</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- HEADING-BANNER END -->
    <!-- PRODUCT-AREA START -->
    <div class="product-area pt-80 pb-80 product-style-2">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <!-- Shop-Content End -->
                    <div class="shop-content">
                        <div class="product-option mb-30 clearfix">
                            <div class="showing text-end d-none d-md-block">
                                <p class="mb-0">Показано {{ str_pad($start, 2, '0', STR_PAD_LEFT) }}
                                    -{{ str_pad($end, 2, '0', STR_PAD_LEFT) }} из {{ $totalCount }} результатов</p>
                            </div>
                        </div>

                        <!-- ПЛИТКА начало -->
                        <div class="tags-wrapper">
                            <div class="container">
                                <div class="tags" id="tagsContainer">
                                    <a href="#" class="tags__item tags__item--all active">Все</a>

                                    <!-- Видимые теги -->
                                    <a href="#" class="tags__item">Металюр</a>
                                    <a href="#" class="tags__item">Магнабел</a>
                                    <a href="#" class="tags__item">Гарда</a>
                                    <a href="#" class="tags__item">Elporta</a>
                                    <a href="#" class="tags__item">Staller</a>
                                    <a href="#" class="tags__item">Luxor</a>
                                    <a href="#" class="tags__item">Промет</a>
                                    <a href="#" class="tags__item">Юркас</a>
                                    <a href="#" class="tags__item">Юни</a>
                                    <a href="#" class="tags__item">Динмар</a>

                                    <!-- Кнопка "..." (видимая часть) -->
                                    <button class="tags__item tags__item--more" id="tagsMore">...</button>

                                    <!-- Скрытые теги (изначально скрыты) -->
                                    <div class="tags__hidden" id="tagsHidden" style="display: contents;">
                                        <a href="#" class="tags__item tags__item--hidden">Emalex</a>
                                        <a href="#" class="tags__item tags__item--hidden">Baguette</a>
                                        <a href="#" class="tags__item tags__item--hidden">Elporta входные</a>
                                        <a href="#" class="tags__item tags__item--hidden">Elporta межкомнатные</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tab panes -->
                        <div class="tab-content mt-xs-30">
                            <div class="tab-pane active" id="grid-view">
                                @include('includes.avi-dveri.products')
                            </div>
                        </div>
                        <!-- Pagination start -->
                        {{ $products->withQueryString()->links() }}
                        <!-- Pagination end -->
                    </div>
                    <!-- Shop-Content End -->
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    @include('includes.avi-dveri.aside_catalog')
                    @include('includes.avi-dveri.aside_filter', [
                        'category' => 'door',
                        'type' => 'entrance',
                    ])
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT-AREA END -->
    @include('includes.avi-dveri.faq', ['faqKey' => 'entrance_doors'])
@endsection

@push('scripts')
    <script src="{{ asset('/avi-dveri_assets/avi-dveri/js/tags.js') }}" defer></script>
@endpush
