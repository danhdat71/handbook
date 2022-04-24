<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookService;
use App\Services\ConfigService;

class ViewController extends Controller
{
    /**
     * Thuộc tính service
     * **/
    protected $bookService;
    protected $configService;

    /**
     * Khởi tạo service
     * **/
    public function __construct(
        BookService $bookService,
        ConfigService $configService
    ){
        $this->bookService = $bookService;
        $this->configService = $configService;
    }

    /**
     * Home page
     *
     * @param none
     * @return view
     * **/
    public function homePage()
    {
        $config = $this->configService->getDetailConfig();
        $book = $this->bookService->getAll();

        return view('book/book', compact(['config', 'book']));
    }
}
