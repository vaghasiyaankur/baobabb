<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::insert([
            [
                'id' => 1,
                'name' => 'ad_expire_length',
                'value' => '30'
            ],
            [
                'id' => 2,
                'name' => 'RTL',
                'value' => 'no'
            ],
            [
                'id' => 3,
                'name' => 'social-login',
                'value' => ''
            ]
        ]);
    }
}
