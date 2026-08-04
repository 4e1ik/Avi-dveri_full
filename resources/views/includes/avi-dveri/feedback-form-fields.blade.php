@php
    $hiddenTitle = $hiddenTitle ?? '';
@endphp

<div class="feedback__input">
    <div class="form_error">
        @error('title')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <input type="hidden" name="title" value="{{ $hiddenTitle }}"/>
</div>

<div class="feedback__input">
    <div class="form_error">
        @error('name')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <input type="text" name="name" placeholder="Имя *" value="{{ old('name') }}" required/>
</div>

<div class="feedback__input">
    <div class="form_error">
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <input type="text" name="email" placeholder="E-mail" value="{{ old('email') }}"/>
</div>

<div class="feedback__input">
    <div class="form_error">
        @error('phone')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <input type="text" name="phone" placeholder="Номер телефона *" value="{{ old('phone') }}" required/>
</div>

<div class="feedback__input">
    <div class="form_error">
        @error('textarea')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <textarea class="custom-textarea" name="textarea" placeholder="Текст сообщения">{{ old('textarea') }}</textarea>
</div>

<!-- ===== СОГЛАСИЕ НА ОБРАБОТКУ ПЕРСОНАЛЬНЫХ ДАННЫХ ===== -->
<div class="feedback__input feedback__input--checkbox">
    <label class="feedback__checkbox-label">
        <input type="checkbox" name="agreement" id="agreementCheckbox" class="feedback__checkbox" value="1">
        <span class="feedback__checkbox-text">
            Я соглашаюсь на обработку <span>персональных данных</span>
        </span>
    </label>
</div>
<!-- ======================================================== -->

<div class="feedback__input">
    <input type="hidden" name="g-recaptcha-response" class="g-recaptcha-response-field">
    <div style="position: absolute; margin:0; color: red;" class="form_error g-recaptcha-error">
        @error('g-recaptcha-response')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<button class="button-one submit-btn-4 btn-disabled" id="submitButton" type="button" onclick="onClick(event)" data-text="Отправить" disabled>
    Отправить
</button>