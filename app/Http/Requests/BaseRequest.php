<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class BaseRequest extends FormRequest
{
    /**
     * Xác thực request
     *
     * @param none
     * @return boolean
     * **/
    public function authorize()
    {
        return true;
    }

    /**
     * Quy định cấu trúc mã lỗi nhập liệu
     *
     * @param Validator $validator
     * @return $errs
     * **/
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        throw new HttpResponseException(
            response()->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}