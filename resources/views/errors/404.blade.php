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
{{--                    <h4 class="text-light-black mt-60">Ooops.... Error 404</h4>--}}
{{--                    <h5 class="text-light-black">Sorry, But the page you are looking for does't exist</h5>--}}
                    <h1>404</h1>
                    <p>Страница не найдена 😕</p>
                    <a href="{{ route('home') }}">Вернуться на главную</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection