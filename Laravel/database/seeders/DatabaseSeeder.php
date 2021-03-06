<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PermissionSeeder::class,
            CountrySeeder::class,
            CurrencySeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            ProductTypeSeeder::class,
            ProductSeeder::class,
            ContinentSeeder::class,
            LanguageSeeder::class,
            PageSeeder::class,
            SettingSeeder::class,
            AdvertisingSeeder::class,
            PictureSeeder::class
        ]);
    }
}
