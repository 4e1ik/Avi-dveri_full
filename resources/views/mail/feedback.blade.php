<x-mail::message>
    <div class="background" style="
            background: rgba(0, 0, 0, 0.4);
            border-radius: 15px;
        ">
        <div class="content" style="
                color: #fff;
                padding: 30px;
                display:flex;
                flex-direction: column;
                align-items:center;
            ">
            <h4>Название товара: <span>{{$data['title']}}</span>.</h4>
            <h4>Имя пользователя: <span>{{$data['name']}}</span>.</h4>
            <h4>Почта пользователя: <span>{{$data['email']}}</span>.</h4>
            <h4>Номер пользователя: <span>{{$data['phone']}}</span>.</h4>
            @if (!$data['textarea'] == null)
                <h4>Комментарий пользователя: <span>{{$data['textarea']}}</span>.</h4>
            @endif
        </div>
    </div>
</x-mail::message>