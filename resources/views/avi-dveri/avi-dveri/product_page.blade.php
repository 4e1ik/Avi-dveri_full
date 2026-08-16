@extends('layouts.avi-dveri.avi-dveri')

@section('content')
    <!-- HEADING-BANNER START -->
    <div class="heading-banner-area overlay-bg">
        <x-feedback-form :title="$product->title" />
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h1>{{ $product->title }}</h1>
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
                            @foreach ($product->images as $image)
                                <div data-price="{{ $image->price }}" data-price-per-set="{{ $image->price_per_set }}"
                                    data-product-price="{{ $product->price }}"
                                    @foreach ($colors as $color)
                                         @if ($image->door_color == $color['value'])
                                             data-color-value="{{ $color['value'] }}"
                                        @endif @endforeach>
                                    <img style="object-fit: contain; width: 370px;"
                                        src="{{ asset('storage/' . $image->image) }}"
                                        alt="{{ $image->description_image }}" />
                                    <a class="view-full-screen" href="{{ asset('storage/' . $image->image) }}"
                                        data-lightbox="roadtrip" data-title="{{ $image->description_image }}">
                                        <i class="zmdi zmdi-zoom-in"></i>
                                    </a>

                                </div>
                            @endforeach
                        </div>
                        <!-- Single-pro-slider Big-photo end -->
                        <div class="product-info">
                            <div class="fix mb-10">
                                <div class="post-title floatleft title1">{{ $product->title }}</div>
                            </div>
                            <!-- Категория товара -->
                            @include('includes.avi-dveri.product_category')
                            <div class="fix option1 mb-15">
                                <span class="pro-price"></span><span class="pro-price"> {{ $product->currency }}</span>
                            </div>
                            <p class="product-availability-line mb-20">
                                <span
                                    class="product-availability-value {{ $product->availability ? 'product-availability--in-stock' : 'product-availability--on-order' }}">{{ $product->availability ? 'В наличии' : 'Под заказ' }}</span>
                            </p>
                            @if ($product->manufacturer)
                                <div class="size-filter single-pro-size mb-35 clearfix">
                                    <ul>
                                        <li><span class="color-title text-capitalize">Производитель</span></li>
                                        <li><a class="active noRedirect"
                                                href="#">{{ $product->manufacturer->name }}</a></li>
                                    </ul>
                                </div>
                            @endif
                            @if (isset($product->door->material))
                                <div class="size-filter single-pro-size mb-35 clearfix">
                                    <ul>
                                        <li><span class="color-title text-capitalize">Материал</span></li>
                                        <li><a class="active noRedirect" href="#">{{ $product->door->material }}</a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                            @if (isset($product->door->glass))
                                <div class="size-filter single-pro-size mb-35 clearfix">
                                    <ul>
                                        <li><span class="color-title text-capitalize">Стекло</span></li>
                                        <li><a class="active noRedirect" href="#">{{ $product->door->glass }}</a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                            @if (isset($product->door) && $product->door->type === 'entrance')
                                <div class="size-filter single-pro-size mb-35 clearfix">
                                    <ul>
                                        <li><span class="color-title text-capitalize">Шумоизоляция</span></li>
                                        <li><a class="active noRedirect"
                                                href="#">{{ $product->door->sound_insulation ? 'Да' : 'Нет' }}</a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                            @if (isset($product->door))
                                <div class="size-filter single-pro-size mb-35 clearfix">
                                    <ul>
                                        <li><span class="color-title text-capitalize">Зеркало</span></li>
                                        <li><a class="active noRedirect"
                                                href="#">{{ $product->door->mirror ? 'Да' : 'Нет' }}</a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                            @if (!($product->category == 'fitting'))
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
                                        @if (isset($colors))
                                            @php
                                                $hasColors = false;
                                                foreach ($product->images as $image) {
                                                    if (isset($image->door_color) || isset($image->fitting_color)) {
                                                        $hasColors = true;
                                                        break;
                                                    }
                                                }
                                            @endphp

                                            @if ($hasColors)
                                                <!-- Заголовок "Цвет" сверху -->
                                                <div class="color-title-wrapper">
                                                    <span class="color-title text-capitalize">Цвет</span>
                                                </div>

                                                <!-- Цвета в линию под заголовком -->
                                                <ul class="color-list">
                                                    @foreach ($product->images as $image)
                                                        @foreach ($colors as $color)
                                                            @if ($image->door_color === $color['value'])
                                                                <li>
                                                                    <a id="color"
                                                                        style="pointer-events: auto; cursor: default"
                                                                        data-title="{{ $color['name'] }}"
                                                                        data-color-value="{{ $color['value'] }}"
                                                                        href="#">
                                                                        <span class="color">
                                                                            <img style="cursor: pointer"
                                                                                src="{{ asset($color['image']) }}"
                                                                                alt="">
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- color end -->
                            <!-- Size start -->
                            @if (isset($product->door->size))
                                <div class="size-filter single-pro-size mb-35 clearfix">
                                    <!-- Заголовок "Размер" сверху -->
                                    <div class="size-title-wrapper">
                                        <span class="color-title text-capitalize">Размер</span>
                                    </div>

                                    <!-- Размеры в линию под заголовком -->
                                    <ul class="active__size">
                                        @foreach ($product->door->size as $item)
                                            <li><a class="noRedirect" href="#">{{ $item }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="product-description">
                                <p>{!! $product->description !!}</p>
                            </div>
                            <button class="button-one submit-btn-4 open_popup_application" type="submit"
                                data-text="Оставить заявку" data-title="{{ $product->title }}">Оставить заявку
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
                                @foreach ($product->images as $image)
                                    @if ($image->door_color != null)
                                        @foreach ($colors as $color)
                                            @if ($image->door_color === $color['value'])
                                                <div style="pointer-events: auto" data-color-value="{{ $color['value'] }}">
                                                    <span data-title="{{ $color['name'] }}">
                                                        <img style="width: 73px;"
                                                            src="{{ asset('storage/' . $image->image) }}"
                                                            alt="{{ $image->description_image }}" />
                                                    </span>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <div style="pointer-events: auto">
                                            <span data-title="{{ $image->description_image }}">
                                                <img style="width: 73px;" src="{{ asset('storage/' . $image->image) }}"
                                                    alt="{{ $image->description_image }}" />
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
        <!-- ===== ТАБЫ: ОТЗЫВЫ И ОПЛАТА/ДОСТАВКА ===== -->
        <div class="product-tabs-area pt-40 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Навигация табов -->
                        <ul class="product-tabs-nav">
                            <li class="product-tabs-nav__item active">
                                <a href="#tab-reviews" data-tab="reviews" class="product-tabs-nav__link">Отзывы</a>
                            </li>
                            <li class="product-tabs-nav__item">
                                <a href="#tab-delivery" data-tab="delivery" class="product-tabs-nav__link">Оплата и
                                    доставка</a>
                            </li>
                        </ul>

                        <!-- Контент табов -->
                        <div class="product-tabs-content">
                            <!-- ТАБ 1: ОТЗЫВЫ -->
                            <div id="tab-reviews" class="product-tabs-content__panel active">
                                <div class="reviews-wrapper">
                                    <!-- Список отзывов -->
                                    <div class="reviews-list">
                                        <h3 class="reviews-list__title">Отзывы покупателей</h3>

                                        @php
                                            $reviews = $product->reviews ?? collect();
                                        @endphp

                                        @if ($reviews->count() > 0)
                                            @foreach ($reviews as $review)
                                                <div class="review-item">
                                                    <div class="review-item__header">
                                                        <span class="review-item__name">{{ $review->name }}</span>
                                                        <div class="review-item__rating">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <span
                                                                    class="review-item__star {{ $i <= $review->rating ? 'active' : '' }}">★</span>
                                                            @endfor
                                                        </div>
                                                        <span
                                                            class="review-item__date">{{ $review->created_at?->format('d.m.Y') }}</span>
                                                    </div>
                                                    <div class="review-item__comment">
                                                        {{ $review->comment }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="reviews-list__empty">Пока нет отзывов. Будьте первым!</p>
                                        @endif
                                    </div>

                                    <!-- Форма добавления отзыва -->
                                    <div class="review-form-wrapper">
                                        <h3 class="review-form__title">Оставить отзыв</h3>

                                        @if (session('success'))
                                            <div class="alert alert-success"
                                                style="padding: 15px; margin-bottom: 20px; background: #d4edda; color: #155724; border-radius: 5px;">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        <form class="review-form" id="reviewForm" action="{{ route('reviews.store') }}"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="form_type" value="review">

                                            <!-- ===== ИМЯ ===== -->
                                            <div class="review-form__group">
                                                <label class="review-form__label">Ваше имя <span
                                                        class="review-form__required">*</span></label>
                                                <div class="form_error">
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <input type="text" name="name" class="review-form__input"
                                                    placeholder="Иван Иванов" value="{{ old('name') }}" required>
                                            </div>

                                            <!-- ===== ОЦЕНКА ===== -->
                                            <div class="review-form__group">
                                                <label class="review-form__label">Оценка <span
                                                        class="review-form__required">*</span></label>
                                                <div class="form_error">
                                                    @error('rating')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="review-form__rating" id="ratingSelector">
                                                    <span class="review-form__star" data-value="1">★</span>
                                                    <span class="review-form__star" data-value="2">★</span>
                                                    <span class="review-form__star" data-value="3">★</span>
                                                    <span class="review-form__star" data-value="4">★</span>
                                                    <span class="review-form__star" data-value="5">★</span>
                                                </div>
                                                <input type="hidden" name="rating" id="ratingValue"
                                                    value="{{ old('rating', 5) }}">
                                            </div>

                                            <!-- ===== ТЕКСТ ОТЗЫВА ===== -->
                                            <div class="review-form__group">
                                                <label class="review-form__label">Текст отзыва <span
                                                        class="review-form__required">*</span></label>
                                                <div class="form_error">
                                                    @error('comment')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <textarea name="comment" class="review-form__textarea" placeholder="Поделитесь своим мнением о товаре..."
                                                    rows="4" required>{{ old('comment') }}</textarea>
                                            </div>

                                            <!-- ===== СОГЛАСИЕ НА ОБРАБОТКУ ДАННЫХ ===== -->
                                            <div class="review-form__group review-form__group--checkbox">
                                                <label class="review-form__checkbox-label">
                                                    <input type="checkbox" name="agreement" class="review-form__checkbox"
                                                        value="1" {{ old('agreement') ? 'checked' : '' }} required>
                                                    <span class="review-form__checkbox-text">
                                                        Я соглашаюсь на обработку <span>персональных данных</span>
                                                    </span>
                                                </label>
                                                <div class="form_error">
                                                    @error('agreement')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- ===== ReCAPTCHA ===== -->
                                            <div class="review-form__group" style="position: relative;">
                                                <input type="hidden" name="g-recaptcha-response"
                                                    class="g-recaptcha-response-field">
                                                <div class="form_error g-recaptcha-error"
                                                    style="position: absolute; margin:0; color: red;">
                                                    @error('g-recaptcha-response')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <button type="submit" class="button-one submit-btn-4 review-form__submit"
                                                data-text="Отправить отзыв">
                                                Отправить отзыв
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- ТАБ 2: ОПЛАТА И ДОСТАВКА -->
                            <div id="tab-delivery" class="product-tabs-content__panel">
                                <div class="delivery-info">
                                    <div class="delivery-info__section">
                                        <h3 class="delivery-info__title">Самовывоз</h3>
                                        <p>223232, Республика Беларусь, Минская область, г. Червень, ул. Минская, д. 15</p>
                                    </div>

                                    <div class="delivery-info__section">
                                        <h3 class="delivery-info__title">Условия доставки входных и межкомнатных дверей
                                        </h3>
                                        <ul class="delivery-info__list">
                                            <li>доставка дверей в пределах МКАД – 30 руб;</li>
                                            <li>доставка до 30 км от МКАД – 30 руб. + 1 руб/км;</li>
                                            <li>доставка до 30 км от МКАД на сумму от 1200 руб. - бесплатно;</li>
                                        </ul>
                                        <p><strong>Доставка осуществляется до подъезда (калитки). Замер и установка дверей
                                                оговариваются с консультантом.</strong></p>
                                        <p><strong>При доставке проверяется комплектность заказа, целостность товара,
                                                подписывается акт передачи товара.</strong></p>
                                    </div>

                                    <div class="delivery-info__section">
                                        <h3 class="delivery-info__title">Условия оплаты</h3>
                                        <p><strong>Оплата производится только в белорусских рублях.</strong></p>
                                        <p>Аванс в размере 30-50% от стоимости заказа.</p>
                                        <img src="{{ asset('/avi-dveri_assets/avi-dveri/img/KSA.webp') }}" alt="Оплата"
                                            class="delivery-info__image">
                                    </div>

                                    <div class="delivery-info__section">
                                        <h3 class="delivery-info__title">Наличный расчет</h3>
                                        <p>Вы оплачиваете вышеуказанный аванс наличными. После проверки комплектности и
                                            качества товаров оплачиваете остаток. При оплате вы получаете кассовый чек,
                                            который является основанием для замены и возврата товара.</p>
                                    </div>

                                    <div class="delivery-info__section">
                                        <h3 class="delivery-info__title">Банковскими картами</h3>
                                        <p>Принимаем к оплате платежные карты Белкарт, Visa, MasterCard (оплата через
                                            терминал). При оплате банковской картой возврат денежных средств в случае такой
                                            необходимости осуществляется на карточку, с которой была произведена оплата.</p>
                                        <img src="{{ asset('/avi-dveri_assets/avi-dveri/img/oplata_bankovskoy_kartoy_onlayn.webp') }}"
                                            alt="Оплата картами" class="delivery-info__image">
                                    </div>

                                    <div class="delivery-info__section">
                                        <h3 class="delivery-info__title">Безналичный расчет</h3>
                                        <p>Доступен для юридических лиц и индивидуальных предпринимателей.</p>
                                    </div>

                                    <div class="delivery-info__section">
                                        <h3 class="delivery-info__title">В рассрочку</h3>
                                        <ul class="delivery-info__list">
                                            <li>от магазина до 3-х мес. без %;</li>
                                            <li>красная карта от Альфа-Банка до 12 мес.;</li>
                                            <li>рассрочка от Альфа-Банка до 5-х мес. 1%.</li>
                                        </ul>
                                    </div>

                                    <div class="delivery-info__section">
                                        <h3 class="delivery-info__title">В кредит</h3>
                                        <ul class="delivery-info__list">
                                            <li>кредит от Альфа-Банка до 12 мес. под 11,9%;</li>
                                            <li>кредит от Беларусбанк «На родныя тавары» до 2-х лет под 4%.</li>
                                        </ul>
                                    </div>

                                    <div class="delivery-info__section">
                                        <h3 class="delivery-info__title">Образец чека</h3>
                                        <a download="Образец чека"
                                            href="{{ asset('/avi-dveri_assets/avi-dveri/img/20250314_162645.webp') }}"
                                            class="delivery-info__download">
                                            Нажмите, чтобы скачать образец чека
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ===== КОНЕЦ ТАБОВ ===== -->
        @if (isset($similarProducts) && $similarProducts->isNotEmpty())
            <div class="product-area pt-20 pb-30 product-style-2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-center">
                                <h2 class="title-border">Похожие товары</h2>
                            </div>

                            <div class="product-slider style-2 arrow-left-right">
                                @foreach ($similarProducts as $item)
                                    <div class="col-12">
                                        <div class="single-product">
                                            <div class="product-img">
                                                @include('includes.avi-dveri.product_card_labels', [
                                                    'product' => $item,
                                                ])
                                                @include('includes.avi-dveri.product_card_images', [
                                                    'product' => $item,
                                                ])
                                            </div>

                                            <div class="product-info clearfix text-center">
                                                <div class="fix">
                                                    <div class="post-title">
                                                        <a @include('includes.avi-dveri.product_route', [
                                                            'product' => $item,
                                                        ])>{{ $item->title }}</a>
                                                    </div>
                                                    <span class="pro-price-2">{{ $item->price }}
                                                        {{ $item->currency }}</span>
                                                </div>

                                                <div class="product-action clearfix">
                                                    <button class="button-one submit-btn-4 open_popup_application"
                                                        type="submit" data-text="Оставить заявку"
                                                        data-title="{{ $item->title }}">
                                                        Оставить заявку
                                                    </button>
                                                </div>

                                                <div class="product-details">
                                                    @include('includes.avi-dveri.product_card_details', [
                                                        'product' => $item,
                                                    ])
                                                </div>
                                            </div>
                                        </div>

                                        <x-feedback-form :title="$item->title" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
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
    {{--    @endforeach --}}
    <!-- PRODUCT-AREA END -->
    <script src="{{ asset('/avi-dveri_assets/avi-dveri/js/product-tabs.js') }}" defer></script>
@endsection
