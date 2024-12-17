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
                                <p class="mb-0">Показано 01-09 из {{$count}} результатов</p>
                            </div>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="grid-view">
                                <div class="row">
                                    <!-- Single-product start -->
                                    @foreach($doors as $door)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <style>
                                                        .hit-label {
                                                            background: #8fc865 none repeat scroll 0 0;
                                                        }
                                                    </style>
                                                    @if($door->label !== null)
                                                            @foreach($door->label as $item)
                                                                <span style="position: relative; padding: 5px;" class="pro-label {{$item == 'new'?('new-label'):($item == 'sale'?('sale-label'):('hit-label'))}}">{{$item == 'new'?('Новинка'):($item == 'sale'?('Скидка'):('Хит'))}}</span>
                                                                @php $label_distance = $label_distance + 75; @endphp
                                                            @endforeach
                                                    @endif
                                                    @if($door->images->isNotEmpty())
                                                        <a style="display: flex; justify-content: center;" href="{{route('product_page', ['id' => $door->id])}}"><img
                                                                    style="object-fit: contain; width: 100px;"
                                                                    src="{{ asset( 'storage/'. $door->images[0]->image ) }}"
                                                                    alt=""/></a>
                                                    @endif
                                                </div>
                                                <div class="product-info clearfix text-center">
                                                    <div class="fix">
                                                        <h4 class="post-title"><a
                                                                    href="{{route('product_page', ['id' => $door->id])}}">{{$door->title}}</a>
                                                        </h4>
                                                        <span class="pro-price-2">{{$door->price_per_canvas}}</span>
                                                    </div>
                                                </div>
                                                <div class="product-details">
                                                    <ul>
                                                        <li>{{$door->description}}</li>
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
                        {{$doors->links()}}
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
                    <aside class="widget shop-filter mb-30">
                        <div class="widget-title">
                            <h4>Цена</h4>
                            <div class="price__label">
                                <input type="radio" id="button1" name="buttons">
                                <label for="button1">↑</label>
                                <input type="radio" id="button2" name="buttons">
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
                    </aside>
                    <!-- Shop-Filter end -->
                    <!-- Widget-Manufacturer start -->
                    <aside class="widget widget-color mb-30">
                        <div class="widget-title">
                            <h4>Назначение</h4>
                        </div>
                        <div class="widget-info color-filter clearfix">
                            <ul>
                                <li><input type="checkbox" class="func_checkbox"><a href="#">Улица<span
                                                class="count">12</span></a></li>
                                <li><input type="checkbox" class="func_checkbox"><a href="#">Квартира<span
                                                class="count">20</span></a></li>
                                <li><input type="checkbox" class="func_checkbox"><a href="#">Терморазрыв<span
                                                class="count">20</span></a></li>
                            </ul>
                        </div>
                    </aside>

                    <button style="width: 100%; height: 45px; font-size: larger; line-height: 45px;"
                            data-text="Отфильтровать" type="submit" class="button-one submit-btn-4">Отфильтровать
                    </button>
                    <!-- Widget-Manufacturer end -->
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT-AREA END -->
@endsection