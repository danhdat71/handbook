<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class SelectBackgroundRequest extends FormRequest
{
    /**
     * Quy định validate
     *
     * @param none
     * @return array $rules
     * **/
    public function rules()
    {
        return [
            'background' => 'required|max:10000|mimes:jpg,png,jpeg,webp'
        ];
    }

    /**
     * Quy định text lỗi
     *
     * @param none
     * @return array $messages
     * **/
    public function messages()
    {
        return [
            'background.required' => 'Vui lòng chọn ảnh !',
            'background.max' => 'Ảnh không quá 10Mb !',
            'background.mimes' => 'Định dạng ảnh phải là jpg, png, jpeg !',
        ];
    }
}