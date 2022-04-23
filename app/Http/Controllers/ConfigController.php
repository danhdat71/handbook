<?php

namespace App\Http\Controllers;

use App\Http\Requests\SelectBackgroundRequest;
use App\Http\Requests\SelectSoundRequest;
use App\Http\Requests\ConfigDataRequest;
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
        return view('admin.config', compact(['config']));
    }

    /**
     * Thay đổi ảnh nền book
     *
     * @param Request $file
     * @return Response
     * **/
    public function changeBackground(SelectBackgroundRequest $request)
    {
        $file = $request->file('background');
        $result = $this->configService->changeBackground($file);

        return $result
            ? $this->success("Thành công !")
            : $this->error500("Lỗi từ phía máy chủ !");
    }

    /**
     * Thay đổi nhạc nền
     *
     * @param Request $file
     * @return Response
     * **/
    public function changeSound(SelectSoundRequest $request)
    {
        $file = $request->file('background_sound');
        $result = $this->configService->changeSound($file);
        return $result
            ? $this->success($result)
            : $this->error500("Lỗi từ phía máy chủ !");
    }

    /**
     * Cấu hình các input
     *
     * @param Request
     * @return Response
     * **/
    public function configData(ConfigDataRequest $request)
    {
        $requestData = $request->all();
        return $this->configService->configData($requestData);
    }
}
