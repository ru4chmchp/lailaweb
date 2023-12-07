<?php

namespace App\Http\Requests;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:sliders,name,NULL,id,deleted_at,NULL|max:255|min:10',
            'description' => 'required',
            'image_path' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.unique' => 'Trùng tên rồi cha',
            'name.required' => 'Nhập tên vào nhanh -.-',
            'name.max' => 'Tên ngắn thôi tên gì mà dài thế nhờ',
            'name.min' => 'Kiệm từ à ? :) > 5 kí tự mới đc ',
            'image_path.required' => 'Ảnh đâu, ko đăng ảnh sao mà làm slider :)))',
            'description.required' => 'Ko mô tả ai biết là cái gì'
        ];
    }
}
