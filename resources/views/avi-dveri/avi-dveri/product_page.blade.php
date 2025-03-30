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
                            <h2>{{$product->title}}</h2>
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
                                <div data-price="{{$image->price}}" data-price-per-set="{{$image->price_per_set}}"
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
                                <h4 class="post-title floatleft">{{$product->title}}</h4>
                            </div>
                            <div class="fix option1 mb-20">
                                <span class="pro-price"></span><span class="pro-price"> {{$product->currency}}</span>
                            </div>
                            <div class="product-description">
                                <p>{!! $product->description !!}</p>
                            </div>
                            @if(!$product->category == 'fitting')
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
                                        <ul>
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
                                    @if(isset($product->door->glass))
                                        <div class="size-filter single-pro-size mb-35 clearfix">
                                            <ul>
                                                <li><span class="color-title text-capitalize">Стекло</span></li>
                                                <li><a class="active noRedirect" href="#">{{$product->door->glass}}</a>
                                                </li>
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
                                    margin: -2em 0 0 0em;
                                    padding: 5px 5px;
                                    background: #00000096;
                                    font-size: 1.25em;
                                    color: #ffffff;
                                    border-radius: 5px;
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
                                            <span data-title="Цвет: {{$image->description_image}}">
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
