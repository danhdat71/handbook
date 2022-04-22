<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    /**
     * Thuộc tính đối tượng UserRepository
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
        $this->model = User::class;
        $this->db = DB::table('users');
    }

    /**
     * Hàm lấy đối tượng Query Builder
     * **/
    public static function model()
    {
        return DB::table('users');
    }

    /**
     * Hàm lấy đối tượng Eloquent ORM
     * **/
    public static function db()
    {
        return User::class;
    }
}