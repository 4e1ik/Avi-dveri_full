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
        try {
            $data = $mailRequest->all();
            Mail::to('3673518@mail.ru')->send(new FeedbackMail($data));

            // Успешный ответ
            return response()->json([
                'success' => true,
                'message' => 'Письмо успешно отправлено!'
            ]);

        } catch (\Exception $e) {
            // Ошибка при отправке
            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка при отправке письма: ' . $e->getMessage()
            ], 500); // Код 500 для ошибок сервера
        }
    }
}
