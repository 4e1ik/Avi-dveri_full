<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FittingRequest extends FormRequest
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
            'title' => 'required|filled|min:3|max:100',
            'description' => 'required|filled|min:5|max:1000',
            'price' => 'required|filled|max:50',
            'price_per_set' => 'required|filled|max:50',
            'label' => 'max:10',
            'image.*.image' => 'required|image',
        ];
    }
}
