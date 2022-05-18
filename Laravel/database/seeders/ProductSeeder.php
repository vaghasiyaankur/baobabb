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
                "seller_id" => 1,
                "name" => "camera",
                "slug" => "camera",
                "image" => "assets/image/camera18-05-2022-08-18.jpg",
                "description" => "pro camera for sale",
                "country" => 'india',
                "state" => "gujrat",
                "lat" => 21.1702401,
                "long" => 72.83106070000001,
                "city" => "surat",
                "phone" => 123456789,
                "price" => 65000,
                "sale_price" => 4500,
                "type_of" => "sell",
                "cash" => "USD ($)",
                "condition" => "Second hand"
            ],
            [
                "category_id" => 6,
                "seller_id" => 1,
                "name" => "Samsung S21 For Sale",
                "slug" => "sam-s21",
                "image" => "assets/image/download (2)18-05-2022-08-19.jpg",
                // 'gallery' => "['assets\/image\/download (3)18-05-2022-08-19.jpg","assets\/image\/download18-05-2022-08-19.jpg']",
                "description" => "",
                "country" => 'india',
                "state" => "gujrat",
                "lat" => 21.1702401,
                "long" => 72.83106070000001,
                "city" => "surat",
                "phone" => 123456789,
                "price" => 65000,
                "sale_price" => 4500,
                "type_of" => "sell",
                "cash" => "USD ($)",
                "condition" => "Second hand"
            ],
            // [
            //     "category_id" => 6,
            //     "seller_id" => 1,
            //     "name" => "Samsung S21 For Sale",
            //     "slug" => "samsung-s21",
            //     // "image" => "assets/image/download (2)18-05-2022-08-19.jpg",
            //     // "gallery" => '',
            //     // "description" => "",
            //     "country" => 'india',
            //     "state" => "gujrat",
            //     "lat" => 21.1702401,
            //     "long" => 72.83106070000001,
            //     "city" => "surat",
            //     "phone" => 123456789,
            //     "price" => 65000,
            //     "sale_price" => 4500,
            //     "type_of" => "sell",
            //     "cash" => "USD ($)",
            //     "condition" => "Second hand"
            // ],
            // [
            //     "category_id" => 3,
            //     "seller_id" => 1,
            //     "name" => "luxury villa",
            //     "slug" => "luxury-villa",
            //     // "image" => "assets/image/download (1)18-05-2022-08-19.jpg",
            //     // "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quam odio, venenatis nec turpis sit amet, cursus dapibus libero. Integer aliquam tortor eros.",
            //     "country" => 'india',
            //     "state" => "gujrat",
            //     "lat" => 21.1702401,
            //     "long" => 72.83106070000001,
            //     "city" => "vadodara",
            //     "phone" => 123456789,
            //     "price" => 65000,
            //     "sale_price" => 4500,
            //     "type_of" => "sell",
            //     "cash" => "USD ($)",
            //     "condition" => "Second hand"
            // ]
        ]);
    }
}
