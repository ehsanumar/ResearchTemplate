<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Researchs;
use Illuminate\Http\Request;

class SuperAdminForTeacherController extends Controller
{
    public function index()
    {
        $AllUsersHaveRoleTeacher = User::RoleUserTarget('teacher')
        ->CheckDepartment()
        ->with(['roles:id,name'])
        ->select('name', 'email', 'phone', 'id')
        ->paginate(15);
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
