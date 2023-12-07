<?php

namespace App\Http\Requests;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Http\FormRequest;

class SettingAddRequest extends FormRequest
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
            'config_key' => 'bail|required|unique:settings,config_key,NULL,id,deleted_at,NULL|max:255|min:5',
            'config_value' => 'required'
        ];
    }
    
    public function messages(): array
    {
        return [
            'config_key.unique' => 'Trùng key rồi cha',
            'config_key.required' => 'Nhập key vào nhanh -.-',
            'config_key.max' => 'Key ngắn thôi tên gì mà dài thế nhờ',
            'config_key.min' => 'Kiệm từ à ? :) > 5 kí tự mới đc ',
            'config_value.required' => 'Nhập vào nhanh'
        ];
    }
    
}
