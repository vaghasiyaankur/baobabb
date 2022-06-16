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
                "icon" => "assets/image/elec.png",
                "image" => "assets/image/elec.png"
            ],
            [
                "id" => 2,
                "name" => "Appliances",
                "slug" => "appliances",
                "icon" => "assets/image/appl.png",
                "image" => "assets/image/appl.png"
            ],
            [
                "id" => 3,
                "name" => "Housing for sell",
                "slug" => "housing-for-sell",
                "icon" => "assets/image/house.png",
                "image" => "assets/image/house.png"
            ],
            [
                "id" => 4,
                "name" => "Televisions",
                "slug" => "televisions",
                "icon" => "assets/image/tv.png",
                "image" => "assets/image/tv.png"
            ],
            [
                "id" => 5,
                "name" => "Clothes",
                "slug" => "clothes",
                "icon" => "assets/image/cloth.png",
                "image" => "assets/image/cloth.png"
            ],
            [
                "id" => 6,
                "name" => "Cellphones & Tablets",
                "slug" => "cellphones-tablets",
                "icon" => "assets/image/phone.png",
                "image" => "assets/image/phone.png"
            ]
        ]);
    }
}
