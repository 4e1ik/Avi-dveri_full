<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilterV2Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category' => ['required', 'string', Rule::in(['door', 'fitting'])],
            'type' => ['nullable', 'string', 'max:50'],
            'material' => ['nullable', 'array'],
            'material.*' => ['string', 'max:100'],
            'function' => ['nullable', 'array'],
            'function.*' => ['string', 'max:100'],
            'manufacturer_id' => ['nullable', 'array'],
            'manufacturer_id.*' => ['integer', 'exists:manufacturers,id'],
            'label' => ['nullable', 'array'],
            'label.*' => ['string', 'max:50'],
            'price_filter' => ['nullable', Rule::in(['ASC', 'DESC', 'asc', 'desc'])],
            'page' => ['nullable', 'integer', 'min:1'],
        ];
    }
}
