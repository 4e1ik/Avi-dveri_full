<Style>
    .popup_application {
        display: none;
        width: 100%;
        height: 100%;
        position: fixed;
        background: rgba(0, 0, 0, 0.3);
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

    #mail_form {
        background-color: rgba(236, 230, 230, 0.64);
        padding: 10px;
        border-radius: 10px;
    }

    .form__text > h4 {
        color: #5b3a29
    }

    .popup__cross_application {
        cursor: pointer;
        font-size: large;
        transition: 0.2s;
    }

    .popup__cross_application:hover {
        transform: scale(1.2);
    }

    .grecaptcha-badge {
        visibility: hidden;
    }
</Style>

<div class="send-message popup_application">
    <div class="popup__body popup__body_application">
        <form id="mail_form" action="{{ route('send_mail') }}" method="post">
            @csrf
            <div class="form__text">
                <h4 class="title-1 title-border text-uppercase mb-30">Отправить заявку</h4>
                <div class="popup__cross_application">✕</div>
            </div>
            <input type="hidden" name="title" value="{{ $title ?? '' }}"/>
            <input type="text" name="name" placeholder="Имя" value="{{ old('name') }}"/>
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="email" placeholder="E-mail" value="{{ old('email') }}"/>
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="phone" placeholder="Номер телефона" value="{{ old('phone') }}"/>
            @error('phone')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <textarea class="custom-textarea" name="textarea"
                      placeholder="Текст сообщения">{{ old('textarea') }}</textarea>
            @error('textarea')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            @if(session('success'))
                <div class="text-success" style="margin-top: 10px;">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="text-danger" style="margin-top: 10px;">{{ session('error') }}</div>
            @endif
            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
            @error('g-recaptcha-response')
            <div class="text-danger">
                <p>{{$message}}</p>
            </div>
            @enderror
            <button class="button-one submit-btn-4" type="button" onclick="onClick(event)" data-text="Отправить">
                Отправить
            </button>
            {{--            <button class="button-one submit-btn-4" data-text="Отправить" type="submit">Отправить</button>--}}
        </form>
    </div>
</div>