<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                "category_id" => 1,
                "seller_id" => 1,
                "type_id" => 1,
                "type_id" => 1,
                "name" => "camera",
                "slug" => "camera",
                // "image" => "assets/image/camera18-05-2022-08-18.jpg",
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
                "cash" => "1",
                "condition" => "second_hand",
                "created_at" => "2022-05-01 14:34:20",
                "expire" => '2022-07-21 17:30:02',
                'location' => 'Dehradun, Uttarakhand, India',
                'tags' => 'camera'
            ],
            [
                "category_id" => 6,
                "seller_id" => 1,
                "type_id" => 1,
                "name" => "Samsung S21 For Sale",
                "slug" => "sam-s21",
                // "image" => "assets/image/download (2)18-05-2022-08-19.jpg",
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
                "cash" => "1",
                "condition" => "second_hand",
                "created_at" => "2022-05-01 14:34:20",
                "expire" => '2022-07-21 17:30:02',
                'location' => 'Dehradun, Uttarakhand, India',
                'tags' => 'camera'
            ],
            [
                "category_id" => 1,
                "seller_id" => 1,
                "type_id" => 1,
                "name" => "camera",
                "slug" => "camera1",
                // "image" => "assets/image/camera18-05-2022-08-18.jpg",
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
                "cash" => "1",
                "condition" => "second_hand",
                "created_at" => "2022-05-01 14:34:20",
                "expire" => '2022-07-21 17:30:02',
                'location' => 'Dehradun, Uttarakhand, India',
                'tags' => 'camera'
            ],
            [
                "category_id" => 1,
                "seller_id" => 1,
                "type_id" => 1,
                "name" => "camera",
                "slug" => "camera2",
                // "image" => "assets/image/camera18-05-2022-08-18.jpg",
                "description" => "pro camera for sale",
                "country" => 'india',
                "state" => "gujrat",
                "lat" => 21.1702401,
                "long" => 72.83106070000001,
                "city" => "surat",
                "phone" => 123456789,
                "price" => 78794,
                "sale_price" => 4500,
                "type_of" => "sell",
                "cash" => "1",
                "condition" => "new",
                "created_at" => "2022-05-01 14:34:20",
                "expire" => '2022-07-21 17:30:02',
                'location' => 'Dehradun, Uttarakhand, India',
                'tags' => 'camera'
            ],
            [
                "category_id" => 1,
                "seller_id" => 1,
                "type_id" => 1,
                "name" => "camera",
                "slug" => "camera3",
                // "image" => "assets/image/camera18-05-2022-08-18.jpg",
                "description" => "pro camera for sale",
                "country" => 'india',
                "state" => "gujrat",
                "lat" => 21.1702401,
                "long" => 72.83106070000001,
                "city" => "surat",
                "phone" => 123456789,
                "price" => 3333,
                "sale_price" => 4500,
                "type_of" => "sell",
                "cash" => "1",
                "condition" => "refurbished",
                "created_at" => "2022-05-01 14:34:20",
                "expire" => '2022-07-21 17:30:02',
                'location' => 'Dehradun, Uttarakhand, India',
                'tags' => 'camera'
            ],
            [
                "category_id" => 1,
                "seller_id" => 1,
                "type_id" => 1,
                "name" => "camera",
                "slug" => "camera4",
                // "image" => "assets/image/camera18-05-2022-08-18.jpg",
                "description" => "pro camera for sale",
                "country" => 'india',
                "state" => "gujrat",
                "lat" => 21.1702401,
                "long" => 72.83106070000001,
                "city" => "surat",
                "phone" => 123456789,
                "price" => 8977,
                "sale_price" => 4500,
                "type_of" => "sell",
                "cash" => "1",
                "condition" => "opportunity",
                "created_at" => "2022-05-01 14:34:20",
                "expire" => '2022-07-21 17:30:02',
                'location' => 'Dehradun, Uttarakhand, India',
                'tags' => 'camera'
            ],
            [
                "category_id" => 1,
                "seller_id" => 1,
                "type_id" => 1,
                "name" => "camera",
                "slug" => "camera5",
                // "image" => "assets/image/camera18-05-2022-08-18.jpg",
                "description" => "pro camera for sale",
                "country" => 'india',
                "state" => "gujrat",
                "lat" => 21.1702401,
                "long" => 72.83106070000001,
                "city" => "surat",
                "phone" => 123456789,
                "price" => 78455,
                "sale_price" => 4500,
                "type_of" => "sell",
                "cash" => "1",
                "condition" => "part",
                "created_at" => "2022-05-01 14:34:20",
                "expire" => '2022-07-21 17:30:02',
                'location' => 'Dehradun, Uttarakhand, India',
                'tags' => 'camera'
            ],
            [
                "category_id" => 1,
                "seller_id" => 1,
                "type_id" => 1,
                "name" => "camera",
                "slug" => "camera6",
                // "image" => "assets/image/camera18-05-2022-08-18.jpg",
                "description" => "pro camera for sale",
                "country" => 'india',
                "state" => "gujrat",
                "lat" => 21.1702401,
                "long" => 72.83106070000001,
                "city" => "surat",
                "phone" => 123456789,
                "price" => 6500,
                "sale_price" => 4550,
                "type_of" => "sell",
                "cash" => "1",
                "condition" => "second_hand",
                "created_at" => "2022-05-01 14:34:20",
                "expire" => '2022-07-21 17:30:02',
                'location' => 'Dehradun, Uttarakhand, India',
                'tags' => 'camera'
            ],
            // [
            //     "category_id" => 6,
            //     "seller_id" => 1,
                // "type_id" => 1,
            //     "name" => "Samsung S21 For Sale",
            //     "slug" => "samsung-s21",
                // "image" => "assets/image/download (2)18-05-2022-08-19.jpg",
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
            //     "condition" => "second_hand"
            // ],
            // [
            //     "category_id" => 3,
            //     "seller_id" => 1,
                // "type_id" => 1,
            //     "name" => "luxury villa",
            //     "slug" => "luxury-villa",
                // "image" => "assets/image/download (1)18-05-2022-08-19.jpg",
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
            //     "condition" => "second_hand"
            // ]
        ]);
    }
}
