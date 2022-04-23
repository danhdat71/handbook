<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class SelectSoundRequest extends BaseRequest
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
            'background_sound' => 'required|max:10000|mimes:mp3'
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
            'background_sound.required' => 'Âm thanh rỗng !',
            'background_sound.max' => 'Âm thanh không quá 10Mb !',
            'background_sound.mimes' => 'Định dạng Âm thanh phải là mp3 !',
        ];
    }
}