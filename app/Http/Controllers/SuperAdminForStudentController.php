<?php

namespace App\Http\Controllers;

use App\Models\Researchs;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
class SuperAdminForStudentController extends Controller
{
    public function index()
    {

        $Roles= Role::where('name', 'student')->first();
        $AllUsersHaveRoleStudent=User::where('department_id', auth()->user()->department_id)->whereHas('roles', function ($query) use ($Roles) {
            $query->where('name', $Roles->name);
        })->select('name' , 'email' , 'phone','id')->get();
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
