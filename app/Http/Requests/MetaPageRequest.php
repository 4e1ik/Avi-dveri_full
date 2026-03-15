<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MetaPageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'slug' => 'required|string|in:home,katalog,oplata-dostavka,spasibo,vhodnye-dveri,ulica,kvartira,termorazryv,mezhkomnatnye-dveri,ekoshpon,polipropilen,emal,skrytye,massiv,furnitura,ekonom,standart,premium',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ];
    }
}
