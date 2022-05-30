<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                "id" => 1,
                "name" => "admin",
                "email" => "admin@gmail.com",
                "password" => Hash::make("Admin@123"),
                "is_admin" => '1',
                'country' => 1,
                'status' => '1',
                'avatar' => 'assets/image/avatar20-05-2022-04-17.png',
                'email_verified_at' => '2022-05-01 14:45:23'
            ],
            [
                "id" => 2,
                "name" => "user",
                "email" => "user@gmail.com",
                "password" => Hash::make("123456789"),
                "is_admin" => '0',
                'country' => 1,
                'status' => '1',
                'avatar' => 'assets/image/avatar20-05-2022-04-17.png',
                'email_verified_at' => '2022-05-01 14:45:23'
            ],
        ]);
    }
}
