<?php

namespace App\Http\Controllers;

use App\Models\Researchs;
use App\Models\User;
use Illuminate\Http\Request;
class SuperAdminForStudentController extends Controller
{
    public function index()
    {
        $AllUsersHaveRoleStudent=User::CheckDepartment()
        ->with(['roles'])
        ->RoleUserTarget('student')
        ->select('name' , 'email' , 'phone','id')
        ->paginate(15);
        return view('student-page-for-superadmin', ['AllUsersHaveRoleStudent'=> $AllUsersHaveRoleStudent]); //
    }

    public function update(Request $request,$student)
    {
      $student=User::findOrFail($student);
        // Assign the new role (replace 'new_role_name' with the desired role name)
        $student->syncRoles($request->role);
Researchs::where('user_id',$student)->delete();
        // Save the changes
        $student->save();
      return back();

    }

    public function destroy($student)
    {
        User::FindOrFail($student)->delete();
        return back();

    }
}
