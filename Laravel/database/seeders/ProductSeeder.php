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
        Product::create([
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
        ]);
    }
}
