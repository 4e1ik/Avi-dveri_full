<div class="send-message popup_application">
    <div class="popup__body popup__body_application">
        <form class="mail_form" id="mail_form" action="{{ route('send_mail') }}" method="post">
            @csrf
            <div class="form__text">
                <h4 class="title-1 title-border text-uppercase mb-30">Отправить заявку</h4>
                <div class="popup__cross_application">✕</div>
            </div>
            <div class="feedback__input">
                <div class="form_error">
                    @error('title')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <input type="hidden" name="title" value="{{ $title ?? '' }}"/>
            </div>
            <div class="feedback__input">
                <div class="form_error">
                    @error('name')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <input type="text" name="name" placeholder="Имя" value="{{ old('name') }}"/>
            </div>
            <div class="feedback__input">
                <div class="form_error">
                    @error('email')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <input type="text" name="email" placeholder="E-mail" value="{{ old('email') }}"/>
            </div>
            <div class="feedback__input">
                <div class="form_error">
                    @error('phone')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <input type="text" name="phone" placeholder="Номер телефона" value="{{ old('phone') }}"/>
            </div>
            <div class="feedback__input">
                <div class="form_error">
                    @error('textarea')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <textarea class="custom-textarea" name="textarea"
                          placeholder="Текст сообщения">{{ old('textarea') }}</textarea>
            </div>
            <div class="feedback__input">
                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                <div style="position: absolute; margin:0; color: red;" class="form_error">
                    @error('g-recaptcha-response')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <button class="button-one submit-btn-4" type="button" onclick="onClick(event)" data-text="Отправить">
                Отправить
            </button>
            {{--            <button class="button-one submit-btn-4" data-text="Отправить" type="submit">Отправить</button>--}}
        </form>
    </div>
</div>