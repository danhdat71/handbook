<?php

namespace App\Repositories;

use App\Models\Config;
use Illuminate\Support\Facades\DB;

class ConfigRepository
{
    /**
     * Thuộc tính đối tượng ConfigRepository
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
        $this->model = Config::class;
        $this->db = DB::table('configs');
    }

    /**
     * Hàm lấy đối tượng Query Builder
     * **/
    public static function model()
    {
        return DB::table('configs');
    }

    /**
     * Hàm lấy đối tượng Eloquent ORM
     * **/
    public static function db()
    {
        return User::class;
    }
}