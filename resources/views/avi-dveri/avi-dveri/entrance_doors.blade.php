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
                                <p class="mb-0">Показано {{ str_pad($start, 2, '0', STR_PAD_LEFT) }}-{{ str_pad($end, 2, '0', STR_PAD_LEFT) }} из {{ $totalCount }} результатов</p>
                            </div>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="grid-view">
                                <div class="row">
                                    <!-- Single-product start -->
                                    @foreach($products as $product)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <style>
                                                        .hit-label {
                                                            background: #8fc865 none repeat scroll 0 0;
                                                        }
                                                    </style>
                                                    @if($product->label !== null)
                                                        @foreach($product->label as $item)
                                                            <span style="position: relative; padding: 5px;"
                                                                  class="pro-label {{$item == 'new'?('new-label'):($item == 'sale'?('sale-label'):('hit-label'))}}">{{$item == 'new'?('Новинка'):($item == 'sale'?('Скидка'):('Хит'))}}</span>
                                                            @php $label_distance = $label_distance + 75; @endphp
                                                        @endforeach
                                                    @endif
                                                    @if($product->images->isNotEmpty())
                                                        <a style="display: flex; justify-content: center;"
                                                           href="{{route('product_page', ['product' => $product])}}"><img
                                                                    style="object-fit: contain; width: 100px;"
                                                                    src="{{ asset( 'storage/'. $product->images[0]->image ) }}"
                                                                    alt=""/></a>
                                                    @endif
                                                </div>
                                                <div class="product-info clearfix text-center">
                                                    <div class="fix">
                                                        <h4 class="post-title"><a
                                                                    href="{{route('product_page', ['product' => $product])}}">{{$product->title}}</a>
                                                        </h4>
                                                        <span class="pro-price-2">{{$product->price}} {{$product->currency}}</span>
                                                    </div>
                                                </div>
                                                <div class="product-details">
                                                    <ul>
                                                        <li>{{$product->description}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <!-- Single-product end -->
                                </div>
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
                        <aside class="widget shop-filter mb-30">
                            <div class="widget-title">
                                <h4>Цена</h4>
                                <div class="price__label">
                                    <input name="price_filter" value="ASC" type="radio" id="button1">
                                    <label for="button1">↑</label>
                                    <input name="price_filter" value="DESC" type="radio" id="button2">
                                    <label for="button2">↓</label>
                                </div>
                            </div>
                            <div class="widget-info">
                                <div class="price_filter">
                                    <div class="price_slider_amount">
                                        <input type="submit" value="Диапазон :"/>
                                        <input type="text" id="amount" name="price" placeholder="Add Your Price"/>
                                    </div>
                                    <div id="slider-range"></div>
                                </div>
                            </div>
                            <div class="widget-title">
                                <h4>Назначение</h4>
                            </div>
                            <div class="widget-info color-filter clearfix">
                                <ul>
                                    <li><input type="checkbox" name="function" value="street"  class="func_checkbox"><a href="#">Улица<span
                                                    class="count">{{$streetTotalCount}}</span></a></li>
                                    <li><input type="checkbox" name="function" value="apartment" class="func_checkbox"><a href="#">Квартира<span
                                                    class="count">{{$apartmentTotalCount}}</span></a></li>
                                    <li><input type="checkbox"name="function" value="thermal_break" class="func_checkbox"><a href="#">Терморазрыв<span
                                                    class="count">{{$thermal_breakTotalCount}}</span></a></li>
                                </ul>
                            </div>
                        </aside>
                        <!-- Shop-Filter end -->
                        <!-- Widget-Manufacturer start -->
                        <button style="width: 100%; height: 45px; font-size: larger; line-height: 45px;"
                                data-text="Отфильтровать" type="submit" class="button-one submit-btn-4">Отфильтровать
                        </button>
                        <!-- Widget-Manufacturer end -->
                    </form>
                    <a href="{{route('entrance_doors')}}">Очистить фильтр</a>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT-AREA END -->
@endsection