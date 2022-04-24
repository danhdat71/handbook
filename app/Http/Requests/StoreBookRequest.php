<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class StoreBookRequest extends BaseRequest
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
            'images' => 'max:10|min:1',
            'images.*' => 'required|mimes:jpg,png,jpeg|max:10000',
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
            'images.max' => 'Không up quá 20 ảnh cùng lúc !',
            'images.min' => 'Vui lòng up tối thiểu 1 ảnh !',
            'images.*.required' => 'Ảnh rỗng !',
            'images.*.mimes' => 'Ảnh định dạng jpg, png, jpeg !',
            'images.*.max' => 'Ảnh không quá 2Mb !',
        ];
    }
}