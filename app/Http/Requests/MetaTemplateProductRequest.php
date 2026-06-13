<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MetaTemplateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'productType' => 'required|string|max:64',
            'type' => 'nullable|string|max:64',
            'function' => 'nullable|string|max:64',
            'material' => 'nullable|string|max:64',
            'titleTemplate' => 'nullable|string|max:255',
            'descriptionTemplate' => 'nullable|string|max:500',
        ];
    }

    public function attributes(): array
    {
        return [
            'productType' => 'тип товара',
            'titleTemplate' => 'шаблон заголовка',
            'descriptionTemplate' => 'шаблон описания',
        ];
    }

    public function messages(): array
    {
        return [
            'productType.required' => 'Сохранение не выполнено — не удалось определить тип товара. Откройте шаблон из списка заново. | DEV: поле productType не передано в MetaTemplateProductRequest',
            'titleTemplate.max' => 'Шаблон заголовка слишком длинный — сократите до :max символов и сохраните снова.',
            'descriptionTemplate.max' => 'Шаблон описания слишком длинный — сократите до :max символов и сохраните снова.',
        ];
    }
}
