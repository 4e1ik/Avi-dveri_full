@extends('layouts.frontend.frontend')

@section('content')
    <!-- HEADING-BANNER START -->
    <div class="heading-banner-area overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h2>Каталог</h2>
                        </div>
                        <div class="breadcumbs pb-15">
                            <ul>
                                <li><a href="{{route('home')}}">Главная</a></li>
                                <li><a href="{{route('catalog')}}">Каталог</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- HEADING-BANNER END -->
    <!-- Categories START -->
    <div class="banner-area pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-banner banner-1 banner-4">
                        <a class="banner-thumb" href="entrance.html"><img src="{{asset('/avi-dveri_assets/frontend/img/banner/2.png')}}" alt="Картинка входные двери" /></a>
                        <div class="background__banner"></div>
                        <div class="banner-brief">
                            <h2 class="banner-title"><a href="entrance.html">Входные</a></h2>
                            <p class="mb-0">двери</p>
                        </div>
                        <a href="entrance.html" class="button-one font-16px" data-text="Перети">Перейти</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-banner banner-1 banner-4">
                        <a class="banner-thumb" href="Interior-rooms.html"><img src="{{asset('/avi-dveri_assets/frontend/img/banner/1.png')}}" alt="Картинка межкомнатные двери" /></a>
                        <div class="background__banner"></div>
                        <div class="banner-brief">
                            <h2 class="banner-title"><a href="Interior-rooms.html">Межкомнатные</a></h2>
                            <p class="mb-0">двери</p>
                        </div>
                        <a href="Interior-rooms.html" class="button-one font-16px" data-text="Перейти">Перейти</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-banner banner-1 banner-4">
                        <a class="banner-thumb" href="accessories.html"><img src="{{asset('/avi-dveri_assets/frontend/img/banner/3.png')}}" alt="Картинка фурнитура" /></a>
                        <div class="background__banner"></div>
                        <div class="banner-brief">
                            <h2 class="banner-title"><a href="accessories.html">Фурнитура</a></h2>
                            <p class="mb-0">двери</p>
                        </div>
                        <a href="accessories.html" class="button-one font-16px" data-text="Перейти">Перейти</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories END -->
@endsection