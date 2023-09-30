<?php

namespace App\Http\Controllers;

use App\Models\Researchs;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
class SuperAdminForStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Roles= Role::where('name', 'student')->first();
        $AllUsersHaveRoleStudent=User::where('department_id', auth()->user()->department_id)->whereHas('roles', function ($query) use ($Roles) {
            $query->where('name', $Roles->name);
        })->select('name' , 'email' , 'phone','id')->get();
        return view('student-page-for-superadmin', ['AllUsersHaveRoleStudent'=> $AllUsersHaveRoleStudent]); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($student)
    {
        User::FindOrFail($student)->delete();
        return back();

    }
}
