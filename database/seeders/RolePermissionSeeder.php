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
          //permission and role for admin
        $role = Role::create([
            'name' => 'Admin',
            'code' => 'admin',
        ]);

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

            'order-list',
            'order-view',
            'order-edit',
            'order-delete',

            'hire-list',
            'hire-view',
            'hire-edit',
            'hire-delete',

            'file-manager',
            'websetting-edit',
            'user-activity',
            'log-view',
        ];

        for($i=0; $i<count($permissions); $i++)
        {
            $permission = Permission::create(['name' => $permissions[$i]]);

            $role->givePermissionTo($permission);
            $permission->assignRole($role);
        }


        //permission and role for provider
        $role_svp = Role::create([
            'name' => 'Provider',
            'code' => 'SVP',
        ]);

        $permissions_provider = [
            'provider-menu',
        ];

        for($i=0; $i<count($permissions_provider); $i++)
        {
            $permission_pro = Permission::create(['name' => $permissions_provider[$i]]);

            $role_svp->givePermissionTo($permission_pro);
            $permission_pro->assignRole($role_svp);
        }


        //permission and role for customer
        $role_cst = Role::create([
            'name' => 'Customer',
            'code' => 'CST',
        ]);

        $permissions_customer = [
            'customer-menu',
        ];

        for($i=0; $i<count($permissions_customer); $i++)
        {
            $permission_cst = Permission::create(['name' => $permissions_customer[$i]]);

            $role_cst->givePermissionTo($permission_cst);
            $permission_cst->assignRole($role_cst);
        }
    
    }
}
