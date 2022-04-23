<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Repositories\ConfigRepository;

class TypeConfigSeeder extends Seeder
{
    /**
     * Thuộc tính ConfigRepository
     * **/
    public $configRepo;

    /**
     * Dựng đối tượng ConfigRepository
     * **/
    public function __construct(ConfigRepository $configRepo)
    {
        $this->configRepo = $configRepo;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->configRepo->db->truncate();
        $this->configRepo->model::create([
            'type' => "config",
            'book_width' => '700',
            'book_height' => '900',
            'is_gradient' => true,
            'speed' => 2000,
            'auto_center' => true
        ]);
    }
}
