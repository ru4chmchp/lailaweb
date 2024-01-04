<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:categories,name,NULL,id,deleted_at,NULL|max:255|min:5|regex:/^[a-zA-Z\s]+$/u',
            'parent_id' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.unique' => 'Trùng tên rồi cha',
            'name.required' => 'Nhập tên vào nhanh -.-',
            'name.max' => 'Tên ngắn thôi tên gì mà dài thế nhờ',
            'name.min' => 'Kiệm từ à ? :) > 5 kí tự mới đc ',
            'name.regex' => 'Nhập số làm gì',
            'parent_id.required' => 'Nhập danh mục vào :)'
        ];
    }
}
