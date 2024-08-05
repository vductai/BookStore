<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                'category_name' => 'required|regex:/^[\pL\s\d]+$/u'
        ];
    }

    public function messages()
    {
        return [
                "category_name.required" => "Không được để trống",
                "category_name.regex" => "Không được chứa kí tự đặc biệt"
        ];
    }
}
