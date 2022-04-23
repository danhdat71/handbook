<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookService;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\ReorderPageRequest;

class BookController extends Controller
{
    /**
     * Thuộc tính service
     * **/
    protected $bookService = null;

    /**
     * Hàm dựng
     * **/
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Get danh sách các trang
     *
     * @param none
     * @return Response
     * **/
    public function index()
    {
        $data = $this->bookService->getAll();
        return view('admin/book', compact(['data']));
    }

    /**
     * Tạo đồng loạt các trang
     *
     * @param Request
     * @return Response
     * **/
    public function store(StoreBookRequest $request)
    {
        $results = $this->bookService->store($request->file('images'));
        return $results
            ? $this->success("Upload thành công !")
            : $this->error500("Có lỗi phía backend !");
    }

    /**
     * Đảo thứ tự trang
     *
     * @param Request
     * @return Response
     * **/
    public function reorder(ReorderPageRequest $request)
    {
        $results = $this->bookService->reoder($request->only('id', 'update_position'));
        return $results
            ? $this->success("Upload thành công !")
            : $this->error500("Có lỗi phía backend !");
    }

    /**
     * Xóa trang
     *
     * @param $id : id của trang
     * @return Response
     * **/
    public function destroy($id)
    {
        $results = $this->bookService->destroy($id);
        return $results
            ? redirect()->back()
            : $this->error500("Có lỗi phía backend !");
    }
}
