@extends('layouts.avi-dveri.avi-dveri')

@php($about = config('pages_content.about'))

@section('content')
    <div class="heading-banner-area overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h1>О компании</h1>
                        </div>
                        <div class="breadcumbs pb-15">
                            <ul>
                                <li><a href="{{ route('home') }}">Главная</a></li>
                                <li>О компании</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-us-area pt-80 pb-80">
        <div class="container">
            <div class="contact-us customer-login bg-white p-30">
                <p class="mb-30">{{ $about['intro'] }}</p>
                <p class="tab-title title-border mb-20">Наша цель</p>
                <p class="mb-30">{{ $about['goal'] }}</p>
                <p class="tab-title title-border mb-20">Наши принципы</p>
                <ul class="mb-30">
                    @foreach($about['principles'] as $principle)
                        <li class="mb-10"><strong>{{ $principle['title'] }}</strong> — {{ $principle['text'] }}</li>
                    @endforeach
                </ul>
                <p class="mb-30">{{ $about['history'] }}</p>
                <p class="mb-30">{{ $about['trust'] }}</p>
                <p class="tab-title title-border mb-20">Сотрудничество с нашей компанией — это</p>
                <ul class="mb-30">
                    @foreach($about['benefits'] as $benefit)
                        <li class="mb-10">{{ $benefit }}</li>
                    @endforeach
                </ul>
                <p class="mb-40">{{ $about['closing'] }}</p>

                <p class="tab-title title-border mb-20">Сертификаты</p>
                <div class="row mb-40">
                    @for($i = 0; $i < 3; $i++)
                        <div class="col-sm-4 col-xs-12 mb-20">
                            <div class="about-gallery-placeholder">
                                <span>Фото будет добавлено</span>
                            </div>
                        </div>
                    @endfor
                </div>

                <p class="tab-title title-border mb-20">Фото офиса</p>
                <div class="row">
                    @for($i = 0; $i < 3; $i++)
                        <div class="col-sm-4 col-xs-12 mb-20">
                            <div class="about-gallery-placeholder">
                                <span>Фото будет добавлено</span>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .about-gallery-placeholder {
            background: #e8e8e8;
            min-height: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #777;
            border-radius: 4px;
        }
    </style>
@endpush
