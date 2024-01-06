<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerAddRequest extends FormRequest
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
            'name' => 'required|max:255|min:5',
            'email' => 'required|unique:customers',
            'password' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nhập tên vào nhanh -.-',
            'name.max' => 'Tên ngắn thôi tên gì mà dài thế nhờ',
            'name.min' => 'Kiệm từ à ? :) > 5 kí tự mới đc ',
            'email.required' => 'Nhập email vào nhanh :)',
            'password.required' => 'Nhập password vào đê',
            'email.unique' => 'Trùng email rồi cha',
            'address.required' => 'Nhập địa chỉ vào',
            'phone.required' => 'Nhập số điện thoại vào để ng t biết',
            'phone.numeric' => 'Chỉ nhập số thôi'
        ];
    }
}
