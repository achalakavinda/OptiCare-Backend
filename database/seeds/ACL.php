<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class ACL extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $role_admin = Role::create(['name' => config('constant.ROLE_ADMIN') ]);
        $role_optician = Role::create(['name' => config('constant.ROLE_Optician') ]);
        $role_patient = Role::create(['name' => config('constant.ROLE_Patient') ]);

        //permission default
        $permission = Permission::create(['name' => config('constant.Permission_Admin')]);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Optician')]);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Product')]);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_CheckUp')]);
        $role_admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => config('constant.Permission_Setting')]);
        $role_admin->givePermissionTo($permission);




        $user = \App\User::where('email','admin@test.com')->first();
        $user->assignRole( config('constant.ROLE_ADMIN') );
    }
}
