<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['guard_name' => 'admin', 'name' => 'super-admin']);
        $user = Admin::create([
            "name" => "Super Admin",
            "email" => "superadmin@gmail.com",
            "password" => Hash::make('laptoplaptop32'),
        ]);
        $user->assignRole('super-admin');
        $role->givePermissionTo(Permission::all());
        // $permissions = [
        //     'role-list',
        //     'role-create',
        //     'role-edit',
        //     'role-delete',
        //     'user-list',
        //     'user-create',
        //     'user-edit',
        //     'user-delete'
        //  ];
 
 
        //  foreach ($permissions as $permission) {
        //       Permission::create([
        //           'name' => $permission,
        //           'guard_name' => 'admin'
        //     ]);
        //  }
    }
}
