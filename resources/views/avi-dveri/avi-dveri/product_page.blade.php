@extends('layouts.avi-dveri.avi-dveri')

@section('content')
    <!-- HEADING-BANNER START -->
    @foreach($products as $product)
        <div class="heading-banner-area overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading-banner">
                            <div class="heading-banner-title">
                                <h2>{{$product->title}}</h2>
                            </div>
                            <div class="breadcumbs pb-15">
                                <ul>
                                    <li><a href="{{route('home')}}">Главная</a></li>
                                    <li><a href="{{route('catalog')}}">Каталог</a></li>
                                    @if($product && $product instanceof App\Models\Door)
                                        @if($product->type == 'interior')
                                            <li><a href="{{route('interior_doors')}}">Межкомнатные двери</a></li>
                                        @else
                                        <li><a href="{{route('entrance_doors')}}">Входные двери</a></li>
                                        @endif
                                    @elseif($product && $product instanceof App\Models\Fitting)
                                        <li><a href="{{route('accessories')}}">Фурнитура</a></li>
                                    @endif
                                    <li>{{$product->title}}</li>
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
                                @foreach($product->images as $image)
                                    <div>
                                        <img style="object-fit: contain; width: 370px;" src="{{ asset('storage/' . $image->image) }}" alt="{{$image->description_image}}"/>
                                        <a class="view-full-screen" href="{{ asset('storage/' . $image->image) }}"
                                           data-lightbox="roadtrip" data-title="My caption">
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
                                    <span class="pro-price">{{$product->price_per_canvas}}</span>
                                </div>
                                <div class="product-description">
                                    <p>{{$product->description}}</p>
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
                                                @foreach($product->images as $image)
                                                    @foreach($colors as $color)
                                                        @if($image->door_color === $color['value'])
                                                            <li><a style="pointer-events: auto" data-title="{{$color['name']}}" class="active noRedirect"
                                                                   href="#">
                                                                    <span class="color">
                                                                        <img src="{{asset($color['image'])}}" alt="">
                                                                    </span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                        </div>
                                        <!-- color end -->
                                        <!-- Size start -->
                                        <div class="size-filter single-pro-size mb-35 clearfix">
                                            <ul>
                                                <li><span class="color-title text-capitalize">Размер</span></li>
                                                <div class="active__size">
                                                    @foreach($product->size as $item)
                                                        <li><a class="noRedirect" href="#">{{$item}}</a></li>
                                                    @endforeach

{{--                                                    <li><a href="#">200*70</a></li>--}}
{{--                                                    <li><a href="#">200*80</a></li>--}}
{{--                                                    <li><a href="#">200*90</a></li>--}}
                                                </div>
                                            </ul>
                                        </div>
                                        <div class="size-filter single-pro-size mb-35 clearfix">
                                            <ul>
                                                <li><span class="color-title text-capitalize">Стекло</span></li>
                                                <li><a class="active noRedirect" href="#">{{$product->glass}}</a></li>
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
                                    @foreach($product->images as $image)
                                        <div>
                                            <img style="width: 73px;" src="{{ asset('storage/' . $image->image) }}" alt="{{$image->description_image}}"/>
                                        </div>
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
            function changeContent() {
                const selectElement = document.getElementById("selector");
                const selectedValue = selectElement.value;
                const divElement = document.querySelector(".fix");
                const spanElement = document.querySelector(".pro-price");

                // Меняем класс div
                divElement.className = `fix ${selectedValue}`;

                // Меняем текст внутри span
                if (selectedValue === "option1") {
                    spanElement.textContent = @json($product->price_per_canvas);
                } else if (selectedValue === "option2") {
                    spanElement.textContent = @json($product->price_per_set);
                }
            }
        </script>

        <script>
            // Находим все ссылки с классом noRedirect
            const links = document.querySelectorAll('.noRedirect');

            // Добавляем обработчик клика на каждую ссылку
            links.forEach(link => {
                link.style.cursor = 'default';
                link.addEventListener('click', function(event) {
                    event.preventDefault(); // Останавливаем стандартное поведение
                    console.log(`Клик по ссылке: ${this.textContent}`);
                });
            });
        </script>
    @endforeach
    <!-- PRODUCT-AREA END -->
@endsection
