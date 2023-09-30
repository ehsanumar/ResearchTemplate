<?php

namespace Database\Seeders;

use App\Models\faculties;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Arts',
            'Science',
            'Education',
            'Law',
            'Engineering',
        ];
        foreach ($permissions as  $permission) {
            faculties::create(['faculty' => $permission]);
        }

    }
}
