<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Http;

class ReviewRequest extends FormRequest
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
        $recaptchaRule = ['required', function (string $attribute, mixed $value, \Closure $fail) {
            $g_response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $value,
                'remoteip' => \request()->ip(),
            ]);
            if (!$g_response->json('success')) {
                $fail('Подтвердите, что вы не робот');
            }
        }];

        return [
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|min:2|max:50',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:3|max:1000',
            'agreement' => 'required|accepted',
            'g-recaptcha-response' => $recaptchaRule,
        ];
    }

    /**
     * Get the validation error messages.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'product_id.required' => 'Не указан товар.',
            'product_id.exists' => 'Товар не найден.',
            
            'name.required' => 'Имя обязательно для заполнения.',
            'name.min' => 'Имя должно содержать минимум 2 символа.',
            'name.max' => 'Имя не может быть длиннее 50 символов.',
            
            'rating.required' => 'Пожалуйста, поставьте оценку.',
            'rating.integer' => 'Оценка должна быть числом.',
            'rating.min' => 'Минимальная оценка - 1.',
            'rating.max' => 'Максимальная оценка - 5.',
            
            'comment.required' => 'Текст отзыва обязателен для заполнения.',
            'comment.min' => 'Текст отзыва должен содержать минимум 3 символа.',
            'comment.max' => 'Текст отзыва не может быть длиннее 1000 символов.',
            
            'agreement.required' => 'Необходимо согласие на обработку персональных данных.',
            'agreement.accepted' => 'Необходимо согласие на обработку персональных данных.',
            
            'g-recaptcha-response.required' => 'Подтвердите, что вы не робот.',
        ];
    }
}