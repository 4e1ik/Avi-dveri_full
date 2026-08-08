<?php

namespace App\Http\Requests;

use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTagRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-z0-9-]+$/',
                'unique:tags,slug',
                Rule::notIn(Tag::RESERVED_SLUGS),
            ],
            'is_visible' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'slug.not_in' => 'Этот slug зарезервирован под разделы каталога.',
            'slug.regex' => 'Slug может содержать только латинские буквы в нижнем регистре, цифры и дефисы.',
        ];
    }
}
