<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    /**
     * Thuộc tính AuthService
     * **/
    protected $authService;

    /**
     * Khởi tạo đối tương Auth
     * **/
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Tải màn hình đăng nhập
     *
     * @param none
     * @return View
     * **/
    public function loginView()
    {
        return view('admin/login');
    }

    /**
     * Đăng nhập
     *
     * @param Request
     * @return Response
     * **/
    public function login(LoginRequest $request)
    {
        $result = $this->authService->login($request->only('email', 'password'));
        return $result
            ? true
            : $this->fail("Email hoặc password sai, vui lòng thử lại sau !");
    }

    /**
     * Đăng xuất thiết bị
     *
     * @param none
     * @return view
     * **/
    public function logout()
    {
        $result = $this->authService->logout();
        return $result
            ? view('admin/login')
            : false;
    }
}
