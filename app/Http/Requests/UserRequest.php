<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => ['required', 'min:5', 'regex:/^[a-zA-Z0-9]+$/'],
            'email' => ['required', 'email'],
            'id_role' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Tên người dùng là bắt buộc.',
            'username.min' => 'Tên người dùng phải có ít nhất 5 ký tự.',
            'username.regex' => 'Tên người dùng chỉ được chứa chữ cái và số.',
            //
            'email.required' => 'Địa chỉ email là bắt buộc.',
            'email.regex' => 'Địa chỉ email không hợp lệ.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            //
            'id_role.required' => 'Chọn vai trò'
        ];
    }
}
