<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleHasPermision extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SuperAdminRole = Role::where('name', 'super-admin')->first();
        $SuperAdminRole->syncPermissions(Permission::all());


       // Admin Permissions
        $SuperAdminRole = Role::where('name', 'teacher')->first();
        $SuperAdminRole->syncPermissions(Permission::whereIn('name', ['manage_student', 'decision'])->get());

       // User Permissions
        $SuperAdminRole = Role::where('name', 'student')->first();
        $SuperAdminRole->syncPermissions(Permission::where('name', 'add_research')->get());

    }
}
