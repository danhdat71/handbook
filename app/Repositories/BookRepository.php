<?php

namespace App\Repositories;

use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookRepository
{
    /**
     * Thuộc tính đối tượng BookRepository
     * **/
    public $model = null;
    public $db = null;

    /**
     * Hàm dựng
     *
     * @param none
     * @return none
     * **/
    public function __construct()
    {
        $this->model = Book::class;
        $this->db = DB::table('books');
    }

    /**
     * Hàm lấy đối tượng Query Builder
     * **/
    public static function model()
    {
        return DB::table('books');
    }

    /**
     * Hàm lấy đối tượng Eloquent ORM
     * **/
    public static function db()
    {
        return Book::class;
    }
}