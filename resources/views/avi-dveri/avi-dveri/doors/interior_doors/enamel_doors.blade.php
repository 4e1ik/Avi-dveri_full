@extends('layouts.avi-dveri.avi-dveri')

@section('content')
    <!-- HEADING-BANNER START -->
    <div class="heading-banner-area overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h2>Эмаль</h2>
                        </div>
                        <div class="breadcumbs pb-15">
                            <ul>
                                <li><a href="{{route('home')}}">Главная</a></li>
                                <li><a href="{{route('catalog')}}">Каталог</a></li>
                                <li><a href="{{route('interior_doors')}}">Межкомнатные двери</a></li>
                                <li><a href="{{route('enamel_doors')}}">Эмаль</a></li>
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
                                <div id="products" class="row">
                                    <!-- Single-product start -->
                                    @foreach($products as $product)
                                        <div data-price="{{$product->price}}" class="product col-lg-4 col-md-6">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    @if($product->label !== null)
                                                        <div class="lables">
                                                            @foreach($product->label as $item)
                                                                <span class="pro-label {{$item == 'new'?('new-label'):($item == 'sale'?('sale-label'):($item == 'order'?('order-label'):('hit-label')))}}">{{$item == 'new'?('Новинка'):($item == 'sale'?('Скидка'):($item == 'order'?('На заказ'):('Хит')))}}</span>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    @if($product->images->isNotEmpty())
                                                        <a style="display: flex; justify-content: center;"
                                                           href="{{route('product_page', ['product' => $product])}}"><img
                                                                    style="object-fit: contain;"
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
                                                        @if(isset($product->door->glass))
                                                            <li>Стекло: {{$product->door->glass}}</li>
                                                        @endif
                                                        @if(isset($product->door->material))
                                                            <li>Материал: {{$product->door->material}}</li>
                                                        @endif
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
                    <!-- Widget-Search start -->
                    {{--                    <aside class="widget widget-search mb-30">--}}
                    {{--                        <form action="#">--}}
                    {{--                            <input type="text" placeholder="Поиск"/>--}}
                    {{--                            <button type="submit">--}}
                    {{--                                <i class="zmdi zmdi-search"></i>--}}
                    {{--                            </button>--}}
                    {{--                        </form>--}}
                    {{--                    </aside>--}}
                    <!-- Widget-search end -->
                    <!-- Widget-Categories start -->
                    @include('includes.avi-dveri.aside_catalog')
                    <!-- Widget-categories end -->
                    <!-- Shop-Filter start -->
                    <form action="">
                        @include('includes.avi-dveri.price_filter')

                        <!-- Shop-Filter end -->
                        <!-- Widget-Manufacturer start -->
                        <aside class="widget widget-color mb-30">
                            <div class="widget-title">
                                <h4>Материал</h4>
                            </div>
                            <div class="widget-info color-filter clearfix">
                                <ul>
                                    <li><a href="{{route('eco_veneer_doors')}}">Экошпон<span
                                                    class="count">{{$eco_veneerTotalCount}}</span></a></li>
                                    <li><a href="{{route('polypropylene_doors')}}">Полипропилен<span
                                                    class="count">{{$polypropyleneTotalCount}}</span></a></li>
                                    <li><a href="{{route('enamel_doors')}}">Эмаль<span
                                                    class="count">{{$enamelTotalCount}}</span></a></li>
                                    <li><a href="{{route('hidden_doors')}}">Скрытые<span
                                                    class="count">{{$hiddenTotalCount}}</span></a></li>
                                    <li><a href="{{route('solid_doors')}}">Массив<span
                                                    class="count">{{$solidTotalCount}}</span></a></li>
                                </ul>
                            </div>
                        </aside>

                        {{--                        <button style="width: 100%; height: 45px; font-size: larger; line-height: 45px;"--}}
                        {{--                                data-text="Отфильтровать" type="submit" class="button-one submit-btn-4">Отфильтровать--}}
                        {{--                        </button>--}}
                    </form>
                    {{--                    <a href="{{route('interior_doors')}}">Очистить фильтр</a>--}}
                    <!-- Widget-Manufacturer end -->
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT-AREA END -->
@endsection