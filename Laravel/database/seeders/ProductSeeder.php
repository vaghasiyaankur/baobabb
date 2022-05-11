<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                "category_id" => 1,
                "user_id" => 1,
                "name" => "camera",
                "slug" => "camera",
                "image" => "img.img",
                "description" => "pro camera for sale",
                "country" => 'india',
                "state" => "gujrat",
                "lat" => 415687,
                "long" => 123456,
                "city" => "surat",
                "phone" => 123456789,
                "price" => 65000,
                "sale_price" => 4500,
                "type_of" => "sell",
                "cash" => "USD",
                "condition" => "Second hand"
            ],
            [
                "category_id" => 6,
                "user_id" => 1,
                "name" => "Samsung S21 For Sale",
                "slug" => "camera",
                "image" => "img.img",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quam odio, venenatis nec turpis sit amet, cursus dapibus libero. Integer aliquam tortor eros.",
                "country" => 'india',
                "state" => "gujrat",
                "lat" => 415687,
                "long" => 123456,
                "city" => "surat",
                "phone" => 123456789,
                "price" => 65000,
                "sale_price" => 4500,
                "type_of" => "sell",
                "cash" => "USD",
                "condition" => "Second hand"
            ],
            [
                "category_id" => 3,
                "user_id" => 1,
                "name" => "luxury villa",
                "slug" => "luxury-villa",
                "image" => "img.img",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quam odio, venenatis nec turpis sit amet, cursus dapibus libero. Integer aliquam tortor eros.",
                "country" => 'india',
                "state" => "gujrat",
                "lat" => 415687,
                "long" => 123456,
                "city" => "vadodara",
                "phone" => 123456789,
                "price" => 65000,
                "sale_price" => 4500,
                "type_of" => "sell",
                "cash" => "USD",
                "condition" => "Second hand"
            ]
        ]);
    }
}
