<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoorRequest extends FormRequest
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
            'description' => 'min:5|max:1000',
            'price_per_canvas' => 'required|filled|max:50',
            'price_per_set' => 'required|filled|max:50',
            'size' => 'required|filled|max:150',
            'glass' => 'max:50',
            'type' => 'required|filled|max:50',
            'function' => 'required|filled|max:50',
            'material' => 'required|filled|max:50',
            'label' => 'max:10',
            'image.*.image' => 'required|image',
        ];
    }
}
