@extends('layouts.avi-dveri.avi-dveri')

@section('content')
    <!-- HEADING-BANNER START -->
    <div class="heading-banner-area overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h2>Название товара</h2>
                        </div>
                        <div class="breadcumbs pb-15">
                            <ul>
                                <li><a href="index.html">Главная</a></li>
                                <li>Категория товара</li>
                                <li>Название товара</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- HEADING-BANNER END -->
    <!-- PRODUCT-AREA START -->
    <div class="product-area single-pro-area pt-80 pb-80 product-style-2">
        <div class="container">
            <div class="row shop-list single-pro-info no-sidebar">
                <!-- Single-product start -->
                <div class="col-lg-12">
                    <div class="single-product clearfix">
                        <!-- Single-pro-slider Big-photo start -->
                        <div class="single-pro-slider single-big-photo view-lightbox slider-for">
                            <div>
                                <img src="img/single-product/medium/1.jpg" alt=""/>
                                <a class="view-full-screen" href="img/single-product/large/1.jpg"
                                   data-lightbox="roadtrip" data-title="My caption">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div>
                            <div>
                                <img src="img/single-product/medium/2.jpg" alt=""/>
                                <a class="view-full-screen" href="img/single-product/large/2.jpg"
                                   data-lightbox="roadtrip" data-title="My caption">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div>
                            <div>
                                <img src="img/single-product/medium/3.jpg" alt=""/>
                                <a class="view-full-screen" href="img/single-product/large/3.jpg"
                                   data-lightbox="roadtrip" data-title="My caption">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div>
                            <div>
                                <img src="img/single-product/medium/4.jpg" alt=""/>
                                <a class="view-full-screen" href="img/single-product/large/4.jpg"
                                   data-lightbox="roadtrip" data-title="My caption">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div>
                            <div>
                                <img src="img/single-product/medium/5.jpg" alt=""/>
                                <a class="view-full-screen" href="img/single-product/large/5.jpg"
                                   data-lightbox="roadtrip" data-title="My caption">
                                    <i class="zmdi zmdi-zoom-in"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Single-pro-slider Big-photo end -->
                        <div class="product-info">
                            <div class="fix">
                                <h4 class="post-title floatleft">Название товара</h4>
                            </div>
                            <div class="fix option1 mb-20">
                                <span class="pro-price">560 BYN</span>
                            </div>
                            <div class="product-description">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                    be suffered alteration in some form, by injected humou or randomised words which
                                    donot look even slightly believable. If you are going to use a passage of Lorem
                                    Ipsum. </p>
                            </div>
                            <select id="selector" class="custom-select mb-30" onchange="changeContent()">
                                <option value="option1">Полотно</option>
                                <option value="option2">Комплект</option>
                            </select>
                            <!-- color start -->
                            <div class="product__submit">
                                <div>
                                    <div class="color-filter single-pro-color mb-20 clearfix">
                                        <ul>
                                            <li><span class="color-title text-capitalize">Цвет</span></li>
                                            <li><a data-title="Белый" class="active" href="#"><span
                                                            class="color color-1"></span></a></li>
                                            <li><a data-title="Красный" href="#"><span class="color color-2"></span></a>
                                            </li>
                                            <li><a data-title="Синий" href="#"><span class="color color-7"></span></a>
                                            </li>
                                            <li><a data-title="Желтый" href="#"><span class="color color-3"></span></a>
                                            </li>
                                            <li><a data-title="Зеленый" href="#"><span class="color color-4"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- color end -->
                                    <!-- Size start -->
                                    <div class="size-filter single-pro-size mb-35 clearfix">
                                        <ul>
                                            <li><span class="color-title text-capitalize">Размер</span></li>
                                            <div class="active__size">
                                                <li><a href="#">200*60</a></li>
                                                <li><a href="#">200*70</a></li>
                                                <li><a href="#">200*80</a></li>
                                                <li><a href="#">200*90</a></li>
                                            </div>
                                        </ul>
                                    </div>
                                    <div class="size-filter single-pro-size mb-35 clearfix">
                                        <ul>
                                            <li><span class="color-title text-capitalize">Стекло</span></li>
                                            <li><a class="active" href="#">Grey Fog</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <button class="button-one submit-btn-4 open_popup_application" type="submit"
                                        data-text="Оставить заявку">Оставить заявку
                                </button>
                            </div>
                            <!-- Size end -->
                            <!-- Single-pro-slider Small-photo start -->
                            <div class="single-pro-slider single-sml-photo slider-nav">
                                <div>
                                    <img src="img/single-product/small/1.jpg" alt=""/>
                                </div>
                                <div>
                                    <img src="img/single-product/small/2.jpg" alt=""/>
                                </div>
                                <div>
                                    <img src="img/single-product/small/3.jpg" alt=""/>
                                </div>
                                <div>
                                    <img src="img/single-product/small/4.jpg" alt=""/>
                                </div>
                                <div>
                                    <img src="img/single-product/small/5.jpg" alt=""/>
                                </div>
                            </div>
                            <!-- Single-pro-slider Small-photo end -->
                        </div>
                    </div>
                </div>
                <!-- Single-product end -->
            </div>
            <!-- single-product-tab start -->
            <!--					<div class="single-pro-tab">-->
            <!--						<div id="information">-->
            <!--							<div class="pro-tab-info pro-information">-->
            <!--								<h3 class="tab-title title-border mb-30">Описание</h3>-->
            <!--								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>-->
            <!--								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>-->
            <!--								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas elese ifend. Phasellus a felis at est bibendum feugiat ut eget eni Praesent et messages in con sectetur posuere dolor non.</p>-->
            <!--							</div>-->
            <!--						</div>-->
            <!--					</div>-->
        </div>
    </div>
    <!-- PRODUCT-AREA END -->
@endsection