<?php

namespace App\Repositories;

use App\Models\Config;
use Illuminate\Support\Facades\DB;

class ConfigRepository
{
    public $model = null;
    public $db = null;

    public function __construct()
    {
        $this->model = Config::class;
        $this->db = DB::table('configs');
    }

    public static function model()
    {
        return DB::table('configs');
    }

    public static function db()
    {
        return User::class;
    }
}