<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'support_create',
            'support_edit',
            'support_show',
            'support_delete',
            'support_access',
            'user_create',
            'user_edit',
            'user_show',
            'user_delete',
            'user_access',
            'product_create',
            'product_edit',
            'product_show',
            'product_delete',
            'product_access',
        ];

        foreach($permissions as $permission){
            Permission::create([
                'name'=>$permission
            ]);
        }

        Role::create(['name'=>'Admin']);

       $role =  Role::create(['name'=>'User']);

       $userPermissionns = [
        'user_create',
            'user_edit',
            'user_show',
            'user_delete',
            'user_access',
            'product_create',
            'product_edit',
            'product_show',
            'product_delete',
            'product_access',

       ];

       foreach($userPermissionns as $permission) {
        
         $role->givePermissionTo($permission);
       }
    }
}
