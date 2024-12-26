<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Http;

class MailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'max:256',
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|max:50',
            'phone' => 'required|max:15',
            'textarea' => 'max:256',
//            'g-recaptcha-response' => ['required', function (string $attribute, mixed $value, \Closure $fail){
//                $g_response = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify",[
//                    'secret' => config('services.recaptcha.secret_key'),
//                    'response' => $value,
//                    'remoteip' => \request()->ip(),
//                ]);
//                if (!$g_response->json('success')){
//                    $fail('The {$attribute} is invalid');
//                }
//            }],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Имя обязательно для заполнения.',
            'email.required' => 'E-mail обязателен.',
            'email.email' => 'Введите правильный e-mail.',
            'phone.regex' => 'Введите корректный номер телефона.',
            'textarea.required' => 'Сообщение обязательно для заполнения.',
        ];
    }
}
