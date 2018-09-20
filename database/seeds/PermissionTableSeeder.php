<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;
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
        $user = User::create([
            "name" => "Super Admin",
            "email" => "superadmin@gmail.com",
            "password" => Hash::make('laptoplaptop32'),
        ]);
        $user->assignRole('super-admin');
    }
}
