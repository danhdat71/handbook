<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class SelectBackgroundRequest extends BaseRequest
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
            'background' => 'required|max:10000|mimes:jpg,png,jpeg'
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
            'background.required' => 'Ảnh rỗng !',
            'background.max' => 'Ảnh không quá 10Mb !',
            'background.mimes' => 'Định dạng ảnh phải là jpg, png, jpeg !',
        ];
    }
}