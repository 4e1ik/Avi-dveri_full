<!-- popup -->
<Style>
    .popup_application {
        display: none;
        width: 100%;
        height: 100%;
        position: fixed;
        background: rgba(151, 151, 151, 0.05);
        backdrop-filter: blur(4px);
        -webkit-background: rgba(151, 151, 151, 0.05);
        -webkit-backdrop-filter: blur(4px);
        top: 0;
        left: 0;
        overflow-y: auto;
        overflow-x: hidden;
        z-index: 99;
    }

    .popup__body {
        min-height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 8.125em;
    }

    #contact-form {
        background-color: #c7c2c2;
        padding: 10px;
        border-radius: 10px;
    }

    .form__text>h4 {
        color:#5b3a29
    }

    .popup__cross_application{
        cursor: pointer;
        font-size: large;
        transition: 0.2s;
    }

    .popup__cross_application:hover{
        transform: scale(1.2);
    }
</Style>
<div class="send-message popup_application">
    <div class="popup__body popup__body_application">
        <form id="contact-form" action="{{route('send_mail')}}" method="post">
            @csrf
            <div class="form__text">
                <h4 class="title-1 title-border text-uppercase mb-30">Отправить заявку</h4>
                <div class="popup__cross_application">✕</div>
            </div>
            <input type="text" name="name" placeholder="Имя" />
            <input type="text" name="email" placeholder="E-mail" />
            <textarea class="custom-textarea" name="textarea" placeholder="Текст сообщения"></textarea>
{{--            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">--}}
{{--            @error('g-recaptcha-response')--}}
{{--            <div class="text-danger">--}}
{{--                <p>{{$message}}</p>--}}
{{--            </div>--}}
{{--            @enderror--}}
{{--            <button class="form__form-button" type="button" onclick="onClick(event)">Заказать</button>--}}
            <button class="button-one submit-btn-4" data-text="Отправить" type="submit">Отправить</button>
            <p class="form-message"></p>
        </form>
    </div>
</div>
<!-- end popup -->