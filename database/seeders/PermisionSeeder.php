<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions = [
            'manage_teacher',
            'manage_student',
            //product permissions
            'Decision',
            // Brand
            'add_research',
            //category

        ];
        foreach ($permissions as  $permission) {
            Permission::create(['name' => $permission]);
        }

 }
}
