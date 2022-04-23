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
     * Lỗi validate trả về 200 thay vì 402
     *
     * @param Validator $validator
     * @return $errs
     * **/
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'messages' => $errors
            ], Response::HTTP_OK)
        );
    }
}