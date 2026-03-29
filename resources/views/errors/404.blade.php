@extends('layouts.avi-dveri.avi-dveri')
@section('404')
    <meta name="robots" content="noindex, nofollow">
    @parent
@endsection
@section('content')
<div class="area-404 pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="error-content text-center">
                    <p class="error-http-code" aria-hidden="true">404</p>
                    <h1>Страница не найдена</h1>
                    <p class="text-muted mb-20">Запрошенная страница недоступна или была удалена.</p>
                    <a href="{{ route('home') }}">Вернуться на главную</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection