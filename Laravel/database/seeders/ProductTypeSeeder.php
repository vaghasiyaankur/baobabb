<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductType;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductType::insert([
			[
                'id'    =>  1,
				'name'   => 'Private individual',
				'lft'    => null,
				'rgt'    => null,
				'depth'  => null,
				'active' => '1',
			],
			[
                'id'    =>  2,
				'name'   =>'Professional',
				'lft'    => null,
				'rgt'    => null,
				'depth'  => null,
				'active' => '1',
			],
		]);
		

    }
}
