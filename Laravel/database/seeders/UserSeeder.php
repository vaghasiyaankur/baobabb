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
        User::create([
            "id" => 1,
            "name" => "admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make("Admin@123"),
            "type" => 'admin',
            'country' => 1,
            'avatar' => 'assets/image/avatar20-05-2022-04-17.png'
        ]);
    }
}
