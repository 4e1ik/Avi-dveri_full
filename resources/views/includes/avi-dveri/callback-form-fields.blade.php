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
        @error('phone')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <input type="text" name="phone" placeholder="Номер телефона *" value="{{ old('phone') }}" required/>
</div>
<div class="feedback__input">
    <input type="hidden" name="g-recaptcha-response" class="g-recaptcha-response-field">
    <div style="position: absolute; margin:0; color: red;" class="form_error g-recaptcha-error">
        @error('g-recaptcha-response')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
<button class="button-one submit-btn-4" type="button" onclick="onClick(event)" data-text="Отправить">
    Отправить
</button>
