<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission as Routes;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Routes::defaultPermissions();
        // $permissions = [
        //     "category-create",
        //     "category-delete",
        //     "category-field-create",
        //     "category-field-delete",
        //     "category-field-list",
        //     "category-field-update",
        //     "category-list",
        //     "category-update",
        //     "country-create",
        //     "country-delete",
        //     "country-list",
        //     "country-update",
        //     "currency-create",
        //     "currency-delete",
        //     "currency-list",
        //     "currency-update",
        //     "dashboard-list",
        //     "field-create",
        //     "field-delete",
        //     "field-list",
        //     "field-option-create",
        //     "field-option-delete",
        //     "field-option-list",
        //     "field-option-update",
        //     "field-update",
        //     "language-create",
        //     "language-delete",
        //     "language-list",
        //     "language-update",
        //     "pages-create",
        //     "pages-delete",
        //     "pages-list",
        //     "pages-update",
        //     "permission-create",
        //     "permission-delete",
        //     "permission-list",
        //     "permission-update",
        //     "product-create",
        //     "product-delete",
        //     "product-list",
        //     "product-type-create",
        //     "product-type-delete",
        //     "product-type-list",
        //     "product-type-update",
        //     "product-update",
        //     "role-create",
        //     "role-delete",
        //     "role-list",
        //     "role-update",
        //     "setting-list",
        //     "setting-update",
        //     "sub-category-create",
        //     "sub-category-delete",
        //     "sub-category-list",
        //     "sub-category-update",
        //     "user-create",
        //     "user-delete",
        //     "user-list",
        //     "user-update",
        // ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
