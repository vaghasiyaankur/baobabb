<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entries = [
			[
				'name'   => 'Private individual',
				'lft'    => null,
				'rgt'    => null,
				'depth'  => null,
				'active' => '1',
			],
			[
				'name'   =>'Professional',
				'lft'    => null,
				'rgt'    => null,
				'depth'  => null,
				'active' => '1',
			],
		];
		
		$tableName = (new ProductType())->getTable();
		foreach ($entries as $entry) {
			$entryId = DB::table($tableName)->insertGetId($entry);
		}
    }
}
