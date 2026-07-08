<div class="send-message popup_application">
    <div class="popup__body popup__body_application">
        <form class="mail_form" id="mail_form" action="{{ route('send_mail') }}" method="post">
            @csrf
            <div class="form__text">
                <p class="title-1 title-border text-uppercase mb-30">Отправить заявку</p>
                <div class="popup__cross_feedback" role="button" tabindex="0" aria-label="Закрыть">✕</div>
            </div>
            @include('includes.avi-dveri.feedback-form-fields', ['hiddenTitle' => $title ?? ''])
        </form>
    </div>
</div>
