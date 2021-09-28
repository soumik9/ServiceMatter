<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create role
        $role = Role::create([
            'name' => 'Admin',
            'code' => 'admin',
        ]);

        $role_svp = Role::create([
            'name' => 'Provider',
            'code' => 'SVP',
        ]);

        $role_cst = Role::create([
            'name' => 'Customer',
            'code' => 'CST',
        ]);

        //permission list as array
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',

            'cmscategory-list',
            'cmscategory-create',
            'cmscategory-edit',
            'cmscategory-delete',

            'cms-list',
            'cms-create',
            'cms-edit',
            'cms-delete',

            'currency-list',
            'currency-create',
            'currency-edit',
            'currency-delete',

            'servicecategory-list',
            'servicecategory-create',
            'servicecategory-edit',
            'servicecategory-delete',

            'service-list',
            'service-create',
            'service-edit',
            'service-delete',

            'slide-list',
            'slide-create',
            'slide-edit',
            'slide-delete',

            'file-manager',
            'websetting-edit',
            'user-activity',
            'log-view',

        ];


        //create and assign permission 
        for($i=0; $i<count($permissions); $i++)
        {
            $permission = Permission::create(['name' => $permissions[$i]]);

            $role->givePermissionTo($permission);
            $permission->assignRole($role);
        }
       
    }
}
