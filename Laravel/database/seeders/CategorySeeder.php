<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(
            [
                "id" => 1,
                "name" => "Electronic appliances",
                "slug" => "electronic-appliances",
                "icon" => "elec.png",
                "image" => "elec.png"
            ]
        );
    }
}
