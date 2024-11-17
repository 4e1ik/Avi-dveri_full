@extends('layouts.avi-dveri.avi-dveri')

@section('content')
    <!-- SLIDER-AREA START  -->
    <section class="slider-area slider-style-2">
        <div class="bend niceties preview-2">
            <div id="ensign-nivoslider" class="slides">
                <img src="{{asset('/avi-dveri_assets/avi-dveri/img/slider/1.png')}}" alt="" title="#slider-direction-1"/>
                <img src="{{asset('/avi-dveri_assets/avi-dveri/img/slider/2.png')}}" alt="" title="#slider-direction-2"/>
                <img src="{{asset('/avi-dveri_assets/avi-dveri/img/slider/3.png')}}" alt="" title="#slider-direction-3"/>
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
                                <a href="{{route('accessories')}}" class="button-one style-2 text-uppercase mt-20"
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
                        <a class="banner-thumb" href="{{route('accessories')}}"><img
                                    src="{{asset('/avi-dveri_assets/avi-dveri/img/banner/3.png')}}" alt=""/></a>
                        <div class="background__banner"></div>
                        <div class="banner-brief">
                            <h2 class="banner-title"><a href="{{route('accessories')}}">Фурнитура</a></h2>
                            <p class="mb-0">двери</p>
                        </div>
                        <a href="{{route('accessories')}}" class="button-one font-16px" data-text="Перейти">Перейти</a>
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
                        <div class="col-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <span class="pro-label new-label">ХИТ</span>
                                    <a href="single-product.html"><img
                                                src="{{asset('/avi-dveri_assets/avi-dveri/img/product/1.jpg')}}" alt=""/></a>
                                </div>
                                <div class="product-info clearfix text-center">
                                    <div class="fix">
                                        <h4 class="post-title"><a href="single-product.html">Дверь 1</a></h4>
                                        <span class="pro-price-2">BYN 506.20</span>
                                    </div>
                                    <div class="product-action clearfix">
                                        <button class="button-one submit-btn-4 open_popup_application" type="submit"
                                                data-text="Оставить заявку">Оставить заявку
                                        </button>
                                    </div>
                                    <div class="product-details">
                                        <ul>
                                            <li>Толщина полотна 116 мм</li>
                                            <li>Толщина стального листа с полимерным покрытием 1,2 мм</li>
                                            <li>3 контура уплотнения (1 магнитный)</li>
                                            <li>3 осевые петли на подшипнике</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <span class="pro-label new-label">ХИТ</span>
                                    <a href="single-product.html"><img
                                                src="{{asset('/avi-dveri_assets/avi-dveri/img/product/2.jpg')}}" alt=""/></a>
                                </div>
                                <div class="product-info clearfix text-center">
                                    <div class="fix">
                                        <h4 class="post-title"><a href="single-product.html">Дверь 2</a></h4>
                                        <span class="pro-price-2">BYN 506.20</span>
                                    </div>
                                    <div class="product-action clearfix">
                                        <button class="button-one submit-btn-4 open_popup_application" type="submit"
                                                data-text="Оставить заявку">Оставить заявку
                                        </button>
                                    </div>
                                    <div class="product-details">
                                        <ul>
                                            <li>Толщина полотна 116 мм</li>
                                            <li>Толщина стального листа с полимерным покрытием 1,2 мм</li>
                                            <li>3 контура уплотнения (1 магнитный)</li>
                                            <li>3 осевые петли на подшипнике</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <span class="pro-label new-label">ХИТ</span>
                                    <a href="single-product.html"><img
                                                src="{{asset('/avi-dveri_assets/avi-dveri/img/product/3.jpg')}}" alt=""/></a>
                                </div>
                                <div class="product-info clearfix text-center">
                                    <div class="fix">
                                        <h4 class="post-title"><a href="single-product.html">Дверь 3</a></h4>
                                        <span class="pro-price-2">BYN 506.20</span>
                                    </div>
                                    <div class="product-action clearfix">
                                        <button class="button-one submit-btn-4 open_popup_application" type="submit"
                                                data-text="Оставить заявку">Оставить заявку
                                        </button>
                                    </div>
                                    <div class="product-details">
                                        <ul>
                                            <li>Толщина полотна 116 мм</li>
                                            <li>Толщина стального листа с полимерным покрытием 1,2 мм</li>
                                            <li>3 контура уплотнения (1 магнитный)</li>
                                            <li>3 осевые петли на подшипнике</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <span class="pro-label new-label">ХИТ</span>
                                    <a href="single-product.html"><img
                                                src="{{asset('/avi-dveri_assets/avi-dveri/img/product/3.jpg')}}" alt=""/></a>
                                </div>
                                <div class="product-info clearfix text-center">
                                    <div class="fix">
                                        <h4 class="post-title"><a href="single-product.html">Дверь 3</a></h4>
                                        <span class="pro-price-2">BYN 506.20</span>
                                    </div>
                                    <div class="product-action clearfix">
                                        <button class="button-one submit-btn-4 open_popup_application" type="submit"
                                                data-text="Оставить заявку">Оставить заявку
                                        </button>
                                    </div>
                                    <div class="product-details">
                                        <ul>
                                            <li>Толщина полотна 116 мм</li>
                                            <li>Толщина стального листа с полимерным покрытием 1,2 мм</li>
                                            <li>3 контура уплотнения (1 магнитный)</li>
                                            <li>3 осевые петли на подшипнике</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <span class="pro-label new-label">ХИТ</span>
                                    <a href="single-product.html"><img
                                                src="{{asset('/avi-dveri_assets/avi-dveri/img/product/3.jpg')}}" alt=""/></a>
                                </div>
                                <div class="product-info clearfix text-center">
                                    <div class="fix">
                                        <h4 class="post-title"><a href="single-product.html">Дверь 3</a></h4>
                                        <span class="pro-price-2">BYN 506.20</span>
                                    </div>
                                    <div class="product-action clearfix">
                                        <button class="button-one submit-btn-4 open_popup_application" type="submit"
                                                data-text="Оставить заявку">Оставить заявку
                                        </button>
                                    </div>
                                    <div class="product-details">
                                        <ul>
                                            <li>Толщина полотна 116 мм</li>
                                            <li>Толщина стального листа с полимерным покрытием 1,2 мм</li>
                                            <li>3 контура уплотнения (1 магнитный)</li>
                                            <li>3 осевые петли на подшипнике</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection