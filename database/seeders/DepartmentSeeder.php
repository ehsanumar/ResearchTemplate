<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            'Chemical Engineering',
            'Environmental Engineering',
            'Petroleum and Mining Engineering',

        ];
        foreach ($departments as  $department) {
            Department::create(['department' => $department, 'faculty_id' => 5]);
        }

    }
}
