<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use App\Repositories\BookRepository;

class ReorderPageRequest extends BaseRequest
{
    /**
     * Thuộc tính bookRepo
     * **/
    protected $bookRepo;

    /**
     * Khởi tạo bookRepo
     * **/
    public function __construct(BookRepository $bookRepo)
    {
        $this->bookRepo = $bookRepo;
    }

    /**
     * Quy định validate
     *
     * @param none
     * @return array $rules
     * **/
    public function rules()
    {
        return [
            'id' => 'required|exists:books,id',
            'update_position' => [
                'required',
                'numeric',
                'min:1',
                function($attribute, $value, $fail)
                {
                    $max = $this->bookRepo->model::max('order');
                    return ($value > $max)
                        ? $fail("Tại sao vị trí di chuyển lớn hơn tổng số trang hiện có hả bạn ?")
                        : false;
                }
            ]
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
            'id.required' => 'Vui lòng cung cấp ID trang cần di chuyển !',
            'id.exists' => 'ID trang này không tồn tại !',

            'update_position.required' => 'Vui lòng cấp vị trí cần di chuyển !',
            'update_position.numeric' => 'Vị trí cần di chuyển là dạng số !',
            'update_position.min' => 'Vị trí cần di chuyển từ [1 - tổng trang] !',
        ];
    }
}