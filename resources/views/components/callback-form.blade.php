<div class="send-message popup_callback">
    <div class="popup__body popup__body_callback">
        <form class="mail_form" id="callback_mail_form" action="{{ route('send_mail') }}" method="post">
            @csrf
            <input type="hidden" name="form_type" value="callback">
            <div class="form__text">
                <p class="title-1 title-border text-uppercase mb-30">Заказать звонок</p>
                <div class="popup__cross_callback" role="button" tabindex="0" aria-label="Закрыть">✕</div>
            </div>
            @include('includes.avi-dveri.callback-form-fields')
        </form>
    </div>
</div>
