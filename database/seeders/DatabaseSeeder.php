<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class DatabaseSeeder extends Seeder
{
    use HasRoles;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $teacherRole = Role::where('name', 'teacsher')->first();
         \App\Models\User::factory(1)->create()->each(function ($user) use ($teacherRole) {
            $user->assignRole($teacherRole);
        });;

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
