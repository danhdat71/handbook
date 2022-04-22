<?php

namespace App\Http\Controllers;

use App\Http\Request\SelectBackgroundRequest;
use Illuminate\Http\Request;
use App\Services\ConfigService;

class ConfigController extends Controller
{
    /**
     * Thuộc tính đối tượng
     * **/
    protected $configService;

    /**
     * Hàm dựng
     * **/
    public function __construct(ConfigService $configService)
    {
        $this->configService = $configService;
    }

    /**
     * Load giao diện màn hình tùy chỉnh
     * **/
    public function index()
    {
        $config = $this->configService->getDetailConfig();
        return view('admin.config', compact($config));
    }

    /**
     * Thay đổi ảnh nền book
     *
     * @param Request $file
     * @return $linkFile
     * **/
    public function changeBackground(SelectBackgroundRequest $request)
    {
        return $request->all();
    }
}
