@extends('layouts.avi-dveri.avi-dveri')

@php
    $contacts = config('site_contacts');
    $map = $contacts['map'];
    $mapSrc = 'https://yandex.ru/map-widget/v1/?ll=' . $map['lon'] . '%2C' . $map['lat']
        . '&z=' . $map['zoom']
        . '&pt=' . $map['lon'] . ',' . $map['lat'] . ',pm2rdm'
        . '&l=map';
@endphp

@section('content')
    <div class="heading-banner-area overlay-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-banner">
                        <div class="heading-banner-title">
                            <h1>Контакты</h1>
                        </div>
                        <div class="breadcumbs pb-15">
                            <ul>
                                <li><a href="{{ route('home') }}">Главная</a></li>
                                <li>Контакты</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-us-area pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-30">
                    <div class="contact-us customer-login bg-white p-30">
                        <h3 class="title-border mb-20">Как нас найти</h3>
                        <p class="mb-10"><strong>Адрес:</strong><br>
                            {{ $contacts['address']['line1'] }}<br>
                            {{ $contacts['address']['line2'] }}
                        </p>
                        <p class="mb-10"><strong>Режим работы:</strong><br>
                            @foreach($contacts['working_hours'] as $hours)
                                {{ $hours }}<br>
                            @endforeach
                        </p>
                        <p class="mb-10"><strong>Телефоны:</strong><br>
                            @foreach($contacts['phones'] as $phone)
                                <a href="tel:{{ $phone['tel'] }}">{{ $phone['display'] }}</a><br>
                            @endforeach
                        </p>
                        <p class="mb-10"><strong>Email:</strong>
                            <a href="mailto:{{ $contacts['email']['mailto'] }}">{{ $contacts['email']['display'] }}</a>
                        </p>
                        <p class="mb-20"><strong>Реквизиты:</strong><br>
                            {{ $contacts['legal']['name'] }}<br>
                            УНП {{ $contacts['legal']['unp'] }}<br>
                            {{ $contacts['legal']['registration'] }}<br>
                            {{ $contacts['legal']['trade_register'] }}
                        </p>
                        <p class="mb-10"><strong>Соцсети:</strong><br>
                            @foreach($contacts['social'] as $social)
                                <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer">{{ $social['name'] }}</a>@if(!$loop->last), @endif
                            @endforeach
                        </p>
                        <p class="mb-0"><strong>Мессенджеры:</strong><br>
                            @foreach($contacts['messengers'] as $messenger)
                                <a href="{{ $messenger['url'] }}" target="_blank" rel="noopener noreferrer">{{ $messenger['name'] }}</a>@if(!$loop->last), @endif
                            @endforeach
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-30">
                    <div class="contact-map bg-white p-10">
                        <iframe src="{{ $mapSrc }}" width="100%" height="400" frameborder="0" allowfullscreen="true" title="Карта"></iframe>
                    </div>
                </div>
            </div>
            <div class="row mt-30">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="contact-us customer-login bg-white p-30">
                        <h3 class="title-border mb-30">Форма обратной связи</h3>
                        <form class="mail_form" id="mail_form" action="{{ route('send_mail') }}" method="post">
                            @csrf
                            @include('includes.avi-dveri.feedback-form-fields', ['hiddenTitle' => 'Сообщение со страницы Контакты'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
