<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => 'required|integer|exists:products,id',
            'name' => 'required|string|min:2|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:3|max:2000',
            'agreement' => 'accepted',
        ];
    }

    public function messages(): array
    {
        return [
            'agreement.accepted' => 'Необходимо согласие на обработку персональных данных.',
        ];
    }
}
