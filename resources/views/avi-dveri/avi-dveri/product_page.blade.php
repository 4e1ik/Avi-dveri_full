@extends('layouts.avi-dveri.avi-dveri')

@section('content')
    <!-- HEADING-BANNER START -->
    <div class="heading-banner-area overlay-bg">
        <x-feedback-form :title="$product->title"/>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h1>{{$product->title}}</h1>
                        </div>
                        @include('includes.avi-dveri.product_breadcrumbs')
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
                            @foreach($product->images as $image)
                                <div data-price="{{$image->price}}" data-price-per-set="{{$image->price_per_set}}" data-product-price="{{$product->price}}"
                                     @foreach($colors as $color)
                                         @if($image->door_color == $color['value'])
                                             data-color-value="{{$color['value']}}"
                                        @endif
                                        @endforeach>
                                    <img style="object-fit: contain; width: 370px;"
                                         src="{{ asset('storage/' . $image->image) }}"
                                         alt="{{$image->description_image}}"/>
                                    <a class="view-full-screen" href="{{ asset('storage/' . $image->image) }}"
                                       data-lightbox="roadtrip" data-title="{{$image->description_image}}">
                                        <i class="zmdi zmdi-zoom-in"></i>
                                    </a>

                                </div>
                            @endforeach
                        </div>
                        <!-- Single-pro-slider Big-photo end -->
                        <div class="product-info">
                            <div class="fix">
                                <div class="post-title floatleft">{{$product->title}}</div>
                            </div>
                            <div class="fix option1 mb-20">
                                <span class="pro-price"></span><span class="pro-price"> {{$product->currency}}</span>
                            </div>
                            <p class="product-availability-line mb-20">
                                <span class="product-availability-value {{ $product->availability ? 'product-availability--in-stock' : 'product-availability--on-order' }}">{{ $product->availability ? 'В наличии' : 'Под заказ' }}</span>
                            </p>
                            <div class="product-description">
                                <p>{!! $product->description !!}</p>
                            </div>
                            @if(!($product->category == 'fitting'))
                                <select id="selector" class="custom-select mb-30" onchange="handleSelectChange()"
                                        style="cursor: pointer">
                                    <option value="option1">Полотно</option>
                                    <option value="option2">Комплект</option>
                                </select>
                            @endif
                            <!-- color start -->
                            <div class="product__submit">
                                <div>
                                    <div class="color-filter single-pro-color mb-20 clearfix">
                                        <ul style="display: flex; flex-wrap: wrap; row-gap: 0.5em;">
                                            @if(isset($colors))
                                                @foreach($product->images as $image)
                                                    @if(isset($image->door_color) || isset($image->fitting_color))
                                                        <li><span class="color-title text-capitalize">Цвет</span></li>
                                                        @break
                                                    @endif
                                                @endforeach
                                                @foreach($product->images as $image)
                                                    @foreach($colors as $color)
                                                        @if($image->door_color === $color['value'])
                                                            <li><a id="color"
                                                                   style="pointer-events: auto; cursor: default"
                                                                   data-title="{{$color['name']}}"
                                                                   data-color-value="{{$color['value']}}"
                                                                   href="#">
                                                                    <span class="color">
                                                                        <img style="cursor: pointer"
                                                                             src="{{asset($color['image'])}}" alt="">
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                    <!-- color end -->
                                    <!-- Size start -->
                                    @if(isset($product->door->size))
                                        <div class="size-filter single-pro-size mb-35 clearfix">
                                            <ul>
                                                <li><span class="color-title text-capitalize">Размер</span></li>
                                                <div class="active__size">
                                                    @foreach($product->door->size as $item)
                                                        <li><a class="noRedirect" href="#">{{$item}}</a></li>
                                                    @endforeach
                                                </div>
                                            </ul>
                                        </div>
                                    @endif
                                    @if($product->manufacturer)
                                        <div class="size-filter single-pro-size mb-35 clearfix">
                                            <ul>
                                                <li><span class="color-title text-capitalize">Производитель</span></li>
                                                <li><a class="active noRedirect" href="#">{{ $product->manufacturer->name }}</a></li>
                                            </ul>
                                        </div>
                                    @endif
                                    @if(isset($product->door->material))
                                        <div class="size-filter single-pro-size mb-35 clearfix">
                                            <ul>
                                                <li><span class="color-title text-capitalize">Материал</span></li>
                                                <li><a class="active noRedirect"
                                                       href="#">{{$product->door->material}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                    @if(isset($product->door->glass))
                                        <div class="size-filter single-pro-size mb-35 clearfix">
                                            <ul>
                                                <li><span class="color-title text-capitalize">Стекло</span></li>
                                                <li><a class="active noRedirect" href="#">{{$product->door->glass}}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <button class="button-one submit-btn-4 open_popup_application" type="submit"
                                    data-text="Оставить заявку" data-title="{{$product->title}}">Оставить заявку
                            </button>
                            <!-- Size end -->
                            <!-- Single-pro-slider Small-photo start -->
                            <style>
                                .single-pro-slider .slick-active span:hover::after {
                                    content: attr(data-title);
                                    position: absolute;
                                    margin: 0 0 0 -8px;
                                    padding: 3px 3px;
                                    background: #00000096;
                                    font-size: 1.1em;
                                    color: #ffffff;
                                    border-radius: 5px;
                                }

                                .single-pro-slider .slick-active span {
                                    display: flex;
                                    /*align-items: end;*/
                                    /*justify-content: center;*/
                                }
                            </style>
                            <div class="single-pro-slider single-sml-photo slider-nav">
                                @foreach($product->images as $image)
                                    @if($image->door_color != null)
                                        @foreach($colors as $color)
                                            @if($image->door_color === $color['value'])
                                                <div style="pointer-events: auto"
                                                     data-color-value="{{$color['value']}}">
                                                <span data-title="{{$color['name']}}">
                                                    <img style="width: 73px;"
                                                         src="{{ asset('storage/' . $image->image) }}"
                                                         alt="{{$image->description_image}}"/>
                                                </span>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <div style="pointer-events: auto">
                                            <span data-title="{{$image->description_image}}">
                                                <img style="width: 73px;"
                                                     src="{{ asset('storage/' . $image->image) }}"
                                                     alt="{{$image->description_image}}"/>
                                            </span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <!-- Single-pro-slider Small-photo end -->
                        </div>
                    </div>
                </div>
                <!-- Single-product end -->
            </div>
            <div class="col-lg-12">
                <div class="single-product single-product clearfix">
                    @if(isset($similarProducts) && $similarProducts->isNotEmpty())
                        <div class="product-area pt-20 pb-30 product-style-2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section-title text-center">
                                            <h2 class="title-border">Похожие товары</h2>
                                        </div>

                                        <div class="product-slider style-2 arrow-left-right">
                                            @foreach($similarProducts as $item)
                                                <div class="col-12">
                                                    <div class="single-product">
                                                        <div class="product-img">
                                                            @if($item->label !== null)
                                                                <div class="lables">
                                                                    @foreach($item->label as $label)
                                                                        @if ($label === 'native')
                                                                            <span class="pro-label-native" aria-label="На родныя тавары">
                                                                                <span class="pro-label-native__track">
                                                                                    <span class="pro-label-native__pill">4%</span>
                                                                                    <span class="pro-label-native__expand">На родныя тавары</span>
                                                                                </span>
                                                                            </span>
                                                                        @else
                                                                            <span class="pro-label {{$label == 'new' ? 'new-label' : ($label == 'sale' ? 'sale-label' : ($label == 'order' ? 'order-label' : 'hit-label'))}}">{{$label == 'new' ? 'Новинка' : ($label == 'sale' ? 'Скидка' : ($label == 'order' ? 'На заказ' : 'Хит'))}}</span>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            @endif

                                                            @if($item->images->isNotEmpty())
                                                                <a style="display: flex; justify-content: center;" @include('includes.avi-dveri.product_route', ['product' => $item])>
                                                                    <img style="object-fit: contain;"
                                                                         src="{{ asset('storage/' . $item->images[0]->image) }}"
                                                                         alt="{{ $item->images[0]->description_image ?? $item->title }}"/>
                                                                </a>
                                                            @endif
                                                        </div>

                                                        <div class="product-info clearfix text-center">
                                                            <div class="fix">
                                                                <div class="post-title">
                                                                    <a @include('includes.avi-dveri.product_route', ['product' => $item])>{{ $item->title }}</a>
                                                                </div>
                                                                <span class="pro-price-2">{{ $item->price }} {{ $item->currency }}</span>
                                                            </div>

                                                            <div class="product-action clearfix">
                                                                <button class="button-one submit-btn-4 open_popup_application"
                                                                        type="submit"
                                                                        data-text="Оставить заявку"
                                                                        data-title="{{ $item->title }}">
                                                                    Оставить заявку
                                                                </button>
                                                            </div>

                                                            <div class="product-details">
                                                                @include('includes.avi-dveri.product_card_details', ['product' => $item])
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <x-feedback-form :title="$item->title"/>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        // Находим все ссылки с классом noRedirect
        const links = document.querySelectorAll('.noRedirect');

        // Добавляем обработчик клика на каждую ссылку
        links.forEach(link => {
            link.style.cursor = 'default';
            link.addEventListener('click', function (event) {
                event.preventDefault(); // Останавливаем стандартное поведение
                console.log(`Клик по ссылке: ${this.textContent}`);
            });
        });
    </script>
    {{--    @endforeach--}}
    <!-- PRODUCT-AREA END -->
@endsection
