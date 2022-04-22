<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;

class UserSeeder extends Seeder
{
    /**
     * Global variable
     * **/
    public $userRepo;

    /**
     * Constructor function
     * **/
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->userRepo->db->truncate();
        $this->userRepo->model::create([
            'email' => 'admin@mail.com',
            'password' => Hash::make("12345678"),
            'name' => 'admin'
        ]);
    }
}
