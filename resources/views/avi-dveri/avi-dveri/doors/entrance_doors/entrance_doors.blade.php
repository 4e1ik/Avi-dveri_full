@extends('layouts.avi-dveri.avi-dveri')

@section('content')
    <!-- HEADING-BANNER START -->
    <div class="heading-banner-area overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h2>Входные двери</h2>
                        </div>
                        <div class="breadcumbs pb-15">
                            <ul>
                                <li><a href="{{route('home')}}">Главная</a></li>
                                <li><a href="{{route('catalog')}}">Каталог</a></li>
                                <li><a href="{{route('entrance_doors')}}">Входные двери</a></li>
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
                    <div class="shop-content mt-xs-30">
                        <div class="product-option mb-30 clearfix">
                            <div class="showing text-end d-none d-md-block">
                                <p class="mb-0">Показано {{ str_pad($start, 2, '0', STR_PAD_LEFT) }}
                                    -{{ str_pad($end, 2, '0', STR_PAD_LEFT) }} из {{ $totalCount }} результатов</p>
                            </div>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="grid-view">
                                @include('includes.avi-dveri.products')
                            </div>
                        </div>
                        <!-- Pagination start -->
                        {{$products->withQueryString()->links()}}
                        <!-- Pagination end -->
                    </div>
                    <!-- Shop-Content End -->
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <!-- Widget-Categories start -->
                    @include('includes.avi-dveri.aside_catalog')
                    <!-- Widget-categories end -->
                    <!-- Shop-Filter start -->
                    <form action="">
                        @include('includes.avi-dveri.price_filter')
                            <aside class="widget widget-color mb-30">
                                <div class="widget-title">
                                    <h4>Назначение</h4>
                                </div>
                                <div class="widget-info color-filter clearfix">
                                    <ul>
                                        <li><a href="{{route('street_doors')}}">Улица<span
                                                        class="count">{{$streetTotalCount}}</span></a></li>
                                        <li><a href="{{route('apartment_doors')}}">Квартира<span
                                                        class="count">{{$apartmentTotalCount}}</span></a></li>
                                        <li><a href="{{route('thermal_break_doors')}}">Терморазрыв<span
                                                        class="count">{{$thermal_breakTotalCount}}</span></a></li>
                                    </ul>
                                </div>
                            </aside>
                            <!-- Shop-Filter end -->
                            <!-- Widget-Manufacturer start -->
                            {{--                        <button style="width: 100%; height: 45px; font-size: larger; line-height: 45px;"--}}
                            {{--                                data-text="Отфильтровать" type="submit" class="button-one submit-btn-4">Отфильтровать--}}
                            {{--                        </button>--}}
                            <!-- Widget-Manufacturer end -->
                    </form>
                    {{--                    <a href="{{route('entrance_doors')}}">Очистить фильтр</a>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT-AREA END -->
@endsection