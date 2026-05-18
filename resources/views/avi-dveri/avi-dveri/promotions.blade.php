@extends('layouts.avi-dveri.avi-dveri')

@section('content')
    <div class="heading-banner-area overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h1>{{ $pageTitle }}</h1>
                        </div>
                        <div class="breadcumbs pb-15">
                            <ul>
                                <li><a href="{{ route('home') }}">Главная</a></li>
                                <li>{{ $pageTitle }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-area pt-80 pb-80 product-style-2">
        <div class="container">
            @include('includes.avi-dveri.promotions_tabs')
            <div class="row">
                <div class="col-xs-12">
                    <div class="shop-content">
                        @if($products->count() > 0)
                            <div class="product-option mb-30 clearfix">
                                <div class="showing text-end d-none d-md-block">
                                    <p class="mb-0">Показано {{ str_pad($start, 2, '0', STR_PAD_LEFT) }}
                                        -{{ str_pad($end, 2, '0', STR_PAD_LEFT) }} из {{ $totalCount }} результатов</p>
                                </div>
                            </div>
                            @include('includes.avi-dveri.products')
                            {{ $products->withQueryString()->links() }}
                        @else
                            <p class="mb-0">Сейчас нет товаров в этой категории.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .promotions-tabs { border-bottom: 1px solid #ddd; }
        .promotions-tabs > li > a { padding: 10px 16px; display: block; }
        .promotions-tabs > li.active > a,
        .promotions-tabs > li.active > a:hover { font-weight: 600; border-bottom: 2px solid #c8a165; }
    </style>
@endpush
