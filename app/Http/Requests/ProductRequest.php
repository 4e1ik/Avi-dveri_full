<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
        $product = $this->route('product');
        $slugRules = [
            'nullable',
            'string',
            'max:255',
            'regex:/^[a-z0-9-]+$/',
            $product ? Rule::unique('products', 'slug')->ignore($product->id) : 'unique:products,slug',
        ];

        $rules = [
            'title' => 'required|filled|min:3|max:100',
            'slug' => $slugRules,
            'price' => 'required|filled|max:50',
            'currency' => 'required|filled|max:20',
            'function' => 'required|filled|max:50',
            'label' => 'max:10',
            'availability' => 'required|in:0,1',
            'image.*.image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'description' => 'nullable',
        ];

        if ($this->input('category') === 'door'){
            return array_merge(
                $rules,
                [
                    'type' => 'required|filled|max:50',
                    'glass' => 'max:50',
                    'material' => 'required|filled|max:50',
                    'size_diff' => 'max:20',
                    'size_standard' => 'max:20',
                ]
            );
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'slug.max' => 'Slug не должен превышать :max символов.',
            'slug.unique' => 'Такой slug уже используется. Выберите другой.',
            'slug.regex' => 'Slug может содержать только латинские буквы в нижнем регистре, цифры и дефисы.',
        ];
    }
}
