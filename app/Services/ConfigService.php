<?php

namespace App\Services;

use App\Repositories\ConfigRepository;
use App\Traits\ImageTrait;
use App\Constants\ImageConstants;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class ConfigService
{
    use ImageTrait;

    /**
     * Thuộc tính
     * **/
    protected $configRepo = null;

    /**
     * Hàm dựng
     *
     * @param ConfigRepository $configRepo
     * @return none
     * **/
    public function __construct(ConfigRepository $configRepo)
    {
        $this->configRepo = $configRepo;
    }

    /**
     * Hàm truy vấn dữ liệu màn hình tùy chỉnh
     *
     * @param none
     * @return object $config
     * **/
    public function getDetailConfig()
    {
        return $this->configRepo->model::first();
    }

    /**
     * Update hoặc tạo background
     *
     * @param $backgroundFile
     * @return $link
     * **/
    public function changeBackground($backgroundFile)
    {
        $imagePath = $this->savePublicImage(
            $backgroundFile,
            "background",
            ImageConstants::BACKGROUND,
            100
        );

        return $this->configRepo->model::updateOrCreate(
            ['type' => 'config'],
            [
                'background' => $imagePath['big_image']
            ]
        );
    }

    /**
     * Update hoặc tạo background sound
     *
     * @param $soundFile
     * @return $link
     * **/
    public function changeSound($soundFile)
    {
        $path = Str::random(20) . "." . $soundFile->getClientOriginalExtension();
        Storage::disk('sound')->put($path, file_get_contents($soundFile));

        return $this->configRepo->model::updateOrCreate(
            ['type' => 'config'],
            [
                'background_sound' => "sound/" . $path
            ]
        );
    }

    /**
     * Cấu hình các input
     *
     * @param $request
     * @return Response
     * **/
    public function configData($request)
    {
        return $this->configRepo->model::updateOrCreate(
            ['type' => 'config'], $request
        );
    }
}