<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Picture;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Picture::insert([
            [
                'post_id' => 1,
                'filename' =>'assets/image/camera18-05-2022-08-18.jpg',
                'active' => 1,
                'position' => 1
            ],
            [
                'post_id' => 2,
                'filename' =>'assets/image/camera18-05-2022-08-18.jpg',
                'active' => 1,
                'position' => 1
            ],
            [
                'post_id' => 3,
                'filename' =>'assets/image/camera18-05-2022-08-18.jpg',
                'active' => 1,
                'position' => 1
            ],
            [
                'post_id' => 4,
                'filename' =>'assets/image/camera18-05-2022-08-18.jpg',
                'active' => 1,
                'position' => 1
            ],
            [
                'post_id' => 5,
                'filename' =>'assets/image/camera18-05-2022-08-18.jpg',
                'active' => 1,
                'position' => 1
            ],
            [
                'post_id' => 6,
                'filename' =>'assets/image/camera18-05-2022-08-18.jpg',
                'active' => 1,
                'position' => 1
            ],
            [
                'post_id' => 7,
                'filename' =>'assets/image/camera18-05-2022-08-18.jpg',
                'active' => 1,
                'position' => 1
            ],
            [
                'post_id' => 8,
                'filename' =>'assets/image/camera18-05-2022-08-18.jpg',
                'active' => 1,
                'position' => 1
            ]
        ]);
    }
}
