<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class ConfigDataRequest extends BaseRequest
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
            'book_width' => 'nullable|min:100|max:1000|numeric',
            'book_height' => 'nullable|min:100|max:1000|numeric',
            'speed' => 'nullable|min:500|max:10000|numeric',
            'gradient' => 'nullable|boolean',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255'
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
            'book_width.min' => 'Chiều rộng phải lớn hơn :min !',
            'book_width.max' => 'Chiều rộng không vượt quá :max !',
            'book_width.numeric' => 'Phải nhập là dạng số !',

            'book_height.min' => 'Chiều cao phải lớn hơn :min !',
            'book_height.max' => 'Chiều cao không vượt quá :max !',
            'book_height.numeric' => 'Phải nhập là dạng số !',

            'speed.min' => 'Tối thiểu là :min !',
            'speed.max' => 'Tối thiểu là :max !',
            'speed.numeric' => 'Phải là số !',

            'gradient.boolean' => 'Sai định dạng data !',

            'title.string' => 'Kiểu dữ liệu string !',
            'title.max' => 'Không quá 255 ký tự !',

            'description.string' => 'Kiểu dữ liệu string !',
            'description.max' => 'Không quá 255 ký tự !',

            'website.string' => 'Kiểu dữ liệu string !',
            'website.max' => 'Không quá 255 ký tự !',

            'phone.string' => 'Kiểu dữ liệu string !',
            'phone.max' => 'Không quá 255 ký tự !',
        ];
    }
}