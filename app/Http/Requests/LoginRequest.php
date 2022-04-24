<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|string|max:255',
            'password' => 'required|string|max:255',
        ];
    }

    /**
     * Override lại validate
     *
     * @param none
     * @return array $messages
     * **/
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'messages' => "Email hoặc password sai, vui lòng thử lại sau !"
            ], Response::HTTP_OK)
        );
    }
}