<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            "id" => 1,
            "name" => "admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make("Admin@123"),
            "is_admin" => '1',
            'country' => 1,
            'status' => '1',
            'role_id' => '1',
            'phone' => '+911234567895',
            'avatar' => 'assets/image/avatar20-05-2022-04-17.png',
            'email_verified_at' => '2022-05-01 14:45:23'
        ]);

        $role = Role::create(['name' => 'super-admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
