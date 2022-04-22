<?php

namespace App\Services;

use App\Repositories\ConfigRepository;

class ConfigService
{
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
}