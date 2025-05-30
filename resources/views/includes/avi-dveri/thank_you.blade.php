@extends('layouts.avi-dveri.avi-dveri')
@section('content')
    <div class="area-404 pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="error-content text-center">
                        <h1>Спасибо за вашу заявку!</h1>
                        <p>Вы будете автоматически перенаправлены обратно через 3 секунды...</p>
                        <a href="{{ route('home') }}">Вернуться на главную</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const referrer = new URLSearchParams(window.location.search).get('referrer') || '/';
        setTimeout(() => {
            window.location.href = referrer;
        }, 3000);
    </script>
@endsection
