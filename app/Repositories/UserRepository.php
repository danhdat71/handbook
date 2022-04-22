<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public $model = null;
    public $db = null;

    public function __construct()
    {
        $this->model = User::class;
        $this->db = DB::table('users');
    }

    public static function model()
    {
        return DB::table('users');
    }

    public static function db()
    {
        return User::class;
    }
}