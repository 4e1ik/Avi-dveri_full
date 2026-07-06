<?php

namespace App\Http\Requests;

use App\Support\AdminMetaPages;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MetaPageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'slug' => ['required', 'string', Rule::in(AdminMetaPages::slugs())],
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ];
    }

    public function attributes(): array
    {
        return [
            'slug' => 'страница',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
        ];
    }

    public function messages(): array
    {
        return [
            'slug.required' => 'Сохранение не выполнено — не удалось определить страницу. Обновите страницу и попробуйте снова. | DEV: поле slug не передано в MetaPageRequest',
            'slug.in' => 'Сохранение не выполнено — эта страница пока не настроена для мета-тегов. | DEV: slug «:input» отсутствует в App\Support\AdminMetaPages — добавьте slug в whitelist',
            'meta_title.max' => 'Meta Title слишком длинный — сократите заголовок до :max символов и сохраните снова.',
            'meta_description.max' => 'Meta Description слишком длинный — сократите описание до :max символов и сохраните снова.',
        ];
    }
}
