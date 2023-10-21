<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Researchs;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class SuperAdminForTeacherController extends Controller
{
    public function index()
    {
        $Roles = Role::where('name', 'teacher')->first();
        $AllUsersHaveRoleTeacher = User::where('department_id', auth()->user()->department_id)->whereHas('roles', function ($query) use ($Roles) {
            $query->where('name', $Roles->name);
        })->select('name', 'email', 'phone', 'id')->get();
        return view('teacher-page-for-superadmin', ['AllUsersHaveRoleTeacher' => $AllUsersHaveRoleTeacher]); //
    }

    public function update(Request $request, $teacher)
    {
        $teacherFind = User::findOrFail($teacher);
        // Assign the new role (replace 'new_role_name' with the desired role name)
        $teacherFind->syncRoles($request->role);
        Researchs::where('teacher_id', $teacher)->delete();
        // Save the changes
        $teacherFind->save();
        return back();
    }

    public function destroy($teacher)
    {
        User::FindOrFail($teacher)->delete();
        return back();

    }
}
