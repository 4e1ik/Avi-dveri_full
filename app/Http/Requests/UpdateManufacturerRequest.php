<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateManufacturerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $manufacturer = $this->route('manufacturer');

        return [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:255',
                Rule::unique('manufacturers', 'name')->ignore($manufacturer),
            ],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                'regex:/^[a-z0-9-]+$/',
                Rule::unique('manufacturers', 'slug')->ignore($manufacturer),
            ],
            'type' => 'nullable|in:door,fitting',
            'active' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Укажите название производителя.',
            'name.unique' => 'Производитель с таким названием уже есть.',
            'slug.unique' => 'Такой slug уже занят.',
            'slug.regex' => 'Slug: только латиница в нижнем регистре, цифры и дефисы.',
            'type.in' => 'Некорректный тип (door / fitting или пусто).',
        ];
    }
}
