<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * Thuộc tính user
     * **/
    protected $userRepo;

    /**
     * Khởi tạo userRepo
     * **/
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Đăng nhập cho users
     *
     * @param $credentials
     * @return Response
     * **/
    public function login($credentials)
    {
        if(Auth::attempt($credentials)) {
            return true;
        }

        return false;
    }

    /**
     * Đăng xuất thiết bị
     *
     * @param none
     * @return view
     * **/
    public function logout()
    {
        Auth::logout();
        return true;
    }
}