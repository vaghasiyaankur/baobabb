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
        Category::insert([
            [
                "id" => 1,
                "name" => "Electronic appliances",
                "slug" => "electronic-appliances",
                "icon" => "elec.png",
                "image" => "elec.png"
            ],
            [
                "id" => 2,
                "name" => "Appliances",
                "slug" => "appliances",
                "icon" => "elec.png",
                "image" => "elec.png"
            ],
            [
                "id" => 3,
                "name" => "Housing for sell",
                "slug" => "housing-for-sell",
                "icon" => "elec.png",
                "image" => "elec.png"
            ],
            [
                "id" => 4,
                "name" => "Televisions",
                "slug" => "televisions",
                "icon" => "elec.png",
                "image" => "elec.png"
            ],
            [
                "id" => 5,
                "name" => "Clothes",
                "slug" => "clothes",
                "icon" => "elec.png",
                "image" => "elec.png"
            ],
            [
                "id" => 6,
                "name" => "Cellphones & Tablets",
                "slug" => "cellphones-tablets",
                "icon" => "elec.png",
                "image" => "elec.png"
            ]
        ]);
    }
}
