@extends('layouts.avi-dveri.avi-dveri')

@section('content')
    <!-- SLIDER-AREA START  -->
    <section class="slider-area slider-style-2">
        <div class="bend niceties preview-2">
            <div id="ensign-nivoslider" class="slides">
                <img src="{{asset('/avi-dveri_assets/avi-dveri/img/slider/1.png')}}" alt=""
                     title="#slider-direction-1"/>
                <img src="{{asset('/avi-dveri_assets/avi-dveri/img/slider/2.png')}}" alt=""
                     title="#slider-direction-2"/>
                <img src="{{asset('/avi-dveri_assets/avi-dveri/img/slider/3.png')}}" alt=""
                     title="#slider-direction-3"/>
            </div>
            <div id="slider-direction-1" class="t-cn slider-direction">
                <div class="slider-progress"></div>
                <div class="slider-content t-lfl s-tb slider-1">
                    <div class="title-container s-tb-c title-compress">
                        <div class="layer-1">
                            <div class="wow fadeInUpBig" data-wow-duration="2s" data-wow-delay="0.5s">
                                <h3 class="slider-title3 text-uppercase mb-0"></h3>
                            </div>
                            <div class="wow fadeInUpBig" data-wow-duration="2.5s" data-wow-delay="0.5s">
                                <h2 class="slider-title1 text-uppercase mb-0"><span class="d-md-block">Межкомнатные двери</span>
                                </h2>
                            </div>
                            <div class="wow fadeInUpBig" data-wow-duration="3s" data-wow-delay="0.5s">
                                <h2 class="slider-title2 text-uppercase">Большой выбор по доступной цене</h2>
                            </div>
                            <div class="wow fadeInUpBig" data-wow-duration="3.5s" data-wow-delay="0.5s">
                                <a href="{{route('interior_doors')}}" class="button-one style-2 text-uppercase mt-20"
                                   data-text="Каталог">Каталог</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- direction 2 -->
            <div id="slider-direction-2" class="slider-direction">
                <div class="slider-progress"></div>
                <div class="slider-content t-lfl s-tb slider-1">
                    <div class="title-container s-tb-c title-compress">
                        <div class="layer-1">
                            <div class="wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.5s">
                                <h3 class="slider-title3 text-uppercase mb-0"></h3>
                            </div>
                            <div class="wow fadeInUpBig" data-wow-duration="1.5s" data-wow-delay="0.5s">
                                <h2 class="slider-title1 text-uppercase"><span class="d-lg-block">Входные двери</span>
                                </h2>
                            </div>
                            <div class="wow fadeInUpBig" data-wow-duration="3s" data-wow-delay="0.5s">
                                <h2 class="slider-title2 text-uppercase">- Улица</h2>
                            </div>
                            <div class="wow fadeInUpBig" data-wow-duration="3s" data-wow-delay="0.5s">
                                <h2 class="slider-title2 text-uppercase">- Квартира</h2>
                            </div>
                            <div class="wow fadeInUpBig" data-wow-duration="3s" data-wow-delay="0.5s">
                                <h2 class="slider-title2 text-uppercase">- Дом</h2>
                            </div>
                            <div class="wow fadeInUpBig" data-wow-duration="3.5s" data-wow-delay="0.5s">
                                <a href="{{route('entrance_doors')}}" class="button-one style-2 text-uppercase mt-20"
                                   data-text="Каталог">Каталог</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- direction 3 -->
            <div id="slider-direction-3" class="slider-direction">
                <div class="slider-progress"></div>
                <div class="slider-content t-lfl s-tb slider-1">
                    <div class="title-container s-tb-c title-compress">
                        <div class="layer-1">
                            <div class="wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.5s">
                                <h3 class="slider-title3 text-uppercase mb-0"></h3>
                            </div>
                            <div class="wow fadeInUpBig" data-wow-duration="1.5s" data-wow-delay="0.5s">
                                <h2 class="slider-title1 text-uppercase mb-0"><span class="d-md-block">Фурнитура</span>
                                </h2>
                            </div>
                            <div class="wow fadeInUpBig" data-wow-duration="3s" data-wow-delay="0.5s">
                                <h2 class="slider-title2 text-uppercase">- Эконом</h2>
                            </div>
                            <div class="wow fadeInUpBig" data-wow-duration="3s" data-wow-delay="0.5s">
                                <h2 class="slider-title2 text-uppercase">- Стандарт</h2>
                            </div>
                            <div class="wow fadeInUpBig" data-wow-duration="3s" data-wow-delay="0.5s">
                                <h2 class="slider-title2 text-uppercase">- Премиум</h2>
                            </div>
                            <div class="wow fadeInUpBig" data-wow-duration="3.5s" data-wow-delay="0.5s">
                                <a href="{{route('fittings')}}" class="button-one style-2 text-uppercase mt-20"
                                   data-text="Каталог">Каталог</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SLIDER-AREA END -->
    <!-- Categories START -->
    <div class="banner-area pt-80">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-banner banner-1 banner-4">
                        <a class="banner-thumb" href="{{route('entrance_doors')}}"><img
                                    src="{{asset('/avi-dveri_assets/avi-dveri/img/banner/2.png')}}" alt=""/></a>
                        <div class="background__banner"></div>
                        <div class="banner-brief">
                            <h2 class="banner-title"><a href="{{route('entrance_doors')}}">Входные</a></h2>
                            <p class="mb-0">двери</p>
                        </div>
                        <a href="{{route('entrance_doors')}}" class="button-one font-16px"
                           data-text="Перейти">Перейти</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-banner banner-1 banner-4">
                        <a class="banner-thumb" href="{{route('interior_doors')}}"><img
                                    src="{{asset('/avi-dveri_assets/avi-dveri/img/banner/1.png')}}" alt=""/></a>
                        <div class="background__banner"></div>
                        <div class="banner-brief">
                            <h2 class="banner-title"><a href="{{route('interior_doors')}}">Межкомнатные</a></h2>
                            <p class="mb-0">двери</p>
                        </div>
                        <a href="{{route('interior_doors')}}" class="button-one font-16px"
                           data-text="Перейти">Перейти</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-banner banner-1 banner-4">
                        <a class="banner-thumb" href="{{route('fittings')}}"><img
                                    src="{{asset('/avi-dveri_assets/avi-dveri/img/banner/3.png')}}" alt=""/></a>
                        <div class="background__banner"></div>
                        <div class="banner-brief">
                            <h2 class="banner-title"><a href="{{route('fittings')}}">Фурнитура</a></h2>
                            <p class="mb-0">двери</p>
                        </div>
                        <a href="{{route('fittings')}}" class="button-one font-16px" data-text="Перейти">Перейти</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Categories END -->
    <!-- PRODUCT-AREA START -->
    <div class="product-area pt-80 pb-30 product-style-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="title-border">Хит продаж</h2>
                    </div>
                    <div class="product-slider style-2 arrow-left-right">
                        @foreach($products as $product)
                            <div class="col-12">
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
                                            <a style="display: flex; justify-content: center;" @include('includes.avi-dveri.product_route')>
                                                <img style="object-fit: contain; width: 100px;"
                                                        src="{{ asset( 'storage/'. $product->images[0]->image ) }}"
                                                        alt="{{$product->images[0]->description}}"/>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="product-info clearfix text-center">
                                        <div class="fix">
                                            <h4 class="post-title"><a @include('includes.avi-dveri.product_route')>{{$product->title}}</a>
                                            </h4>
                                            <span class="pro-price-2">
                                            {{$product->price}} {{$product->currency}}
                                        </span>
                                        </div>
                                        <div class="product-action clearfix">
                                            <button class="button-one submit-btn-4 open_popup_application" type="submit"
                                                    data-text="Оставить заявку" data-title="{{$product->title}}">
                                                Оставить заявку
                                            </button>
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
                                <x-feedback-form :title="$product->title"/>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection