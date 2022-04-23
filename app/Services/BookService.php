<?php

namespace App\Services;

use App\Repositories\BookRepository;
use App\Traits\ImageTrait;
use App\Constants\ImageConstants;

class BookService
{
    use ImageTrait;

    /**
     * Thuộc tính bookRepo
     * **/
    protected $bookRepo = null;

    /**
     * Khởi tạo bookRepo
     * **/
    public function __construct(BookRepository $bookRepo)
    {
        $this->bookRepo = $bookRepo;
    }

    /**
     * Load toàn bộ các trang
     * **/
    public function getAll()
    {
        return $this->bookRepo->model::orderBy('order', 'asc')->get();
    }

    /**
     * Lưu ảnh các trang
     *
     * @param $images
     * @return boolean
     * **/
    public function store($images)
    {
        foreach($images as $image){
            $path = $this->savePublicImage(
                $image,
                "book_pages",
                ImageConstants::BOOK_PAGE, 100,
                true
            );
            $this->bookRepo->model::create([
                'big_image' => $path['big_image'],
                'slider_image' => $path['thumb_image'],
                'thumb_image' => $path['blur_image'],
                'order' => $this->bookRepo->model::max('order') + 1
            ]);
        }

        return true;
    }

    /**
     * Đảo thứ tự các trang
     *
     * @param $requestData
     * @return boolean
     * **/
    public function reoder($requestData)
    {
        $pageID = $requestData['id'];
        $currentPosition = $this->bookRepo->model::find($pageID)->order;
        $updatedPosition = $requestData['update_position'];
        $book = $this->bookRepo->model;

        if($currentPosition < $updatedPosition){
            for($i = $currentPosition + 1; $i <= $updatedPosition; $i++){
                $book::where('order', $i)->update(['order' => $i - 1]);
            }
        }else{
            for($i = $currentPosition; $i >= $updatedPosition; $i--){
                $book::where('order', $i)->update(['order' => $i + 1]);
            }
        }
        $book::where('id', $pageID)->update(['order' => $updatedPosition]);

        return true;
    }

    /**
     * Xóa trang khỏi sách
     *
     * @param $id : id trang
     * @return boolean
     * **/
    public function destroy($id)
    {
        $image = $this->bookRepo->model::find($id);
        if($image){
            // Xóa ảnh
            $this->deleteImage([
                $image->big_image,
                $image->thumb_image,
                $image->slider_image
            ]);
            // Xóa dữ liệu
            $order = $image->order;
            $maxOrder = $this->bookRepo->model::max('order');
            for($i = $order + 1; $i <= $maxOrder ; $i++){
                $this->bookRepo->model::where('order', $i)->update([
                    'order' => $i - 1
                ]);
            }
            return $image->delete();
        }

        return false;
    }
}