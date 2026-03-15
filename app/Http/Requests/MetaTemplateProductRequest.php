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
}