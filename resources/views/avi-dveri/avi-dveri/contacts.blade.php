@extends('layouts.avi-dveri.avi-dveri')

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
                            ул. Минская, 15<br>
                            Минская область, г. Червень
                        </p>
                        <p class="mb-10"><strong>Режим работы:</strong><br>
                            Пн–Пт: 9:00–18:00<br>
                            Сб: 10:00–15:00<br>
                            Вс: выходной
                        </p>
                        <p class="mb-10"><strong>Телефоны:</strong><br>
                            <a href="tel:375293673518">+375 (29) 367-35-18</a><br>
                            <a href="tel:375333943324">+375 (33) 394-33-24</a><br>
                            <a href="tel:375336846065">+375 (33) 684-60-65</a>
                        </p>
                        <p class="mb-10"><strong>Email:</strong>
                            <a href="mailto:3673518@mail.ru">3673518@mail.ru</a>
                        </p>
                        <p class="mb-20"><strong>Реквизиты:</strong><br>
                            ИП Исаев Андрей Владимирович<br>
                            УНП 690311744<br>
                            свидетельство о государственной регистрации №0870887 от 15.12.2022 г.<br>
                            Регистрация в Торговом реестре Республики Беларусь №690311744 от 15.11.2004 г.
                        </p>
                        <p class="mb-10"><strong>Соцсети:</strong><br>
                            <a href="https://instagram.com/" target="_blank" rel="noopener noreferrer">Instagram</a>,
                            <a href="https://vk.com/" target="_blank" rel="noopener noreferrer">ВКонтакте</a>
                        </p>
                        <p class="mb-0"><strong>Мессенджеры:</strong><br>
                            <a href="https://t.me/" target="_blank" rel="noopener noreferrer">Telegram</a>,
                            <a href="viber://chat?number=375293673518">Viber</a>,
                            <a href="https://wa.me/375293673518" target="_blank" rel="noopener noreferrer">WhatsApp</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-30">
                    <div class="contact-map bg-white p-10">
                        <iframe src="https://yandex.ru/map-widget/v1/?ll=28.413987%2C53.715421&z=16&pt=28.413779%2C53.715662pm2rdm&l=map"
                                width="100%" height="400" frameborder="0" allowfullscreen="true" title="Карта"></iframe>
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
