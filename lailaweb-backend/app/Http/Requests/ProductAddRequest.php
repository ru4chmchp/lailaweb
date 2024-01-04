<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:products,name,NULL,id,deleted_at,NULL|max:255|min:5',
            'price' => 'required|numeric',
            'price_sale' => 'required|numeric',
            'category_id' => 'required',
            'tags' => 'required',
            'content' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.unique' => 'Trùng tên rồi cha',
            'name.required' => 'Nhập tên vào nhanh -.-',
            'name.max'=> 'Tên ngắn thôi tên gì mà dài thế nhờ',
            'name.min'=> 'Kiệm từ à ? :) > 5 kí tự mới đc ',
            'price.required' => 'Bán free à ?',
            'price.numeric' => 'Nhập số vào ',
            'price_sale.required' => 'Bán free à ?',
            'price_sale.numeric' => 'Nhập số vào ',
            'tags.numeric' => 'Nhập tags vào ',
            'category_id.required' => 'Mục nào khai mau',
            'content.required' => 'Content k có biết cái này là cái gì'
        ];
    }
}
