<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
                "name" => 'required|min:10|regex:/^[\pL\s\d]+$/u',
                "imgPost" => 'required|mimes:png,jpg',
                "price" => 'required|numeric|min:4',
                "category" => 'required'
        ];
    }

    public function messages()
    {
        return [
                "name.required" => "Không được để trống",
                "name.regex" => "Tên sách không được chứa kí tự đặc biệt",
                "name.min" => "Tối thiểu :min kí tự",
                "imgPost.required" => "Vui lòng nhập ảnh",
                "imgPost.mimes" => "Định dạng ảnh không hợp lệ",
                "price.required" => "Không được để trống",
                "price.numeric" => "Vui lòng nhập đúng định dạng",
                "price.min" => "Tối thiểu :min chữ số",
                "category.required" => "Chưa chọn danh mục",
        ];
    }
}
