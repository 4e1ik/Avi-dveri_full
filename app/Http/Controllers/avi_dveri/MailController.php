<?php

namespace App\Http\Controllers\avi_dveri;

use App\Http\Controllers\Controller;
use App\Http\Requests\MailRequest;
use App\Mail\FeedbackMail;
use Illuminate\Support\Facades\Mail;
use Exception;
use Illuminate\Support\Facades\Session;

class MailController extends Controller
{
    public function send(MailRequest $mailRequest)
    {
        $data = $mailRequest->validated();
        try {
            // Отправка письма (пример с использованием Mail)
             // Используем валидацию
            Mail::to('And-2506.1970@yandex.ru')->send(new FeedbackMail($data));

            // Успешное сообщение
            Session::flash('success', 'Ваше сообщение успешно отправлено!');
        } catch (\Exception $e) {
            // Сообщение об ошибке
            Session::flash('error', 'Данные указаны неверно.');
        }

        // Перенаправление обратно
//        return back();
    }
}
