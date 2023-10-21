<?php

namespace App\Http\Controllers;

use App\Models\Researchs;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class SortAndSearchController extends Controller
{
    public function SortStudent(Request $request)
    {
        if ($request['sorting'] === null) {
            return abort(404);
        } else {

            $Roles = Role::where('name', 'student')->first();
            $AllUsersHaveRoleStudent = User::where('department_id', auth()->user()->department_id)->whereHas('roles', function ($query) use ($Roles) {
                $query->where('name', $Roles->name);
            })->select('name', 'email', 'phone', 'id');
            switch ($request->sorting) {
                case 'Oldest':
                    return view('student-page-for-superadmin', ['sort' => $AllUsersHaveRoleStudent->oldest()->get()]);
                    break;
                case 'Latest':
                    return view('student-page-for-superadmin', ['sort' => $AllUsersHaveRoleStudent->Latest()->get()]);

                    break;
                case 'A-z':
                    return view('student-page-for-superadmin', ['sort' => $AllUsersHaveRoleStudent->orderBy('name')->get()]);
                    break;
                case 'Z-a':
                    return view('student-page-for-superadmin', ['sort' => $AllUsersHaveRoleStudent->orderBy('name', 'desc')->get()]);
                    break;

                default:
                    return back();
                    break;
            }
        }
    }
    public function searchStudent(Request $request)
    {
        if ($request['sorting'] === null) {
            return abort(404);
        } else {

            $Roles = Role::where('name', 'student')->first();
            $AllUsersHaveRoleStudent = User::where('department_id', auth()->user()->department_id)
                ->whereHas('roles', function ($query) use ($Roles) {
                    $query->where('name', $Roles->name);
                })
                ->where(function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%')
                        // ->orWhere('email', 'like', '%' . $request->search . '%')
                        // ->orWhere('phone', 'like', '%' . $request->search . '%')
                    ;
                })
                ->select('name', 'email', 'phone', 'id')
                ->get();

            return view('student-page-for-superadmin', [
                'sort' => $AllUsersHaveRoleStudent

            ]);
        }
    }
    public function SortTeacher(Request $request)
    {
        if ($request['sorting'] === null) {
            return abort(404);
        } else {

            $Roles = Role::where('name', 'teacher')->first();
            $AllUsersHaveRoleStudent = User::where('department_id', auth()->user()->department_id)->whereHas('roles', function ($query) use ($Roles) {
                $query->where('name', $Roles->name);
            })->select('name', 'email', 'phone', 'id');
            switch ($request->sorting) {
                case 'Oldest':
                    return view('teacher-page-for-superadmin', ['sort' => $AllUsersHaveRoleStudent->oldest()->get()]);
                    break;
                case 'Latest':
                    return view('teacher-page-for-superadmin', ['sort' => $AllUsersHaveRoleStudent->Latest()->get()]);

                    break;
                case 'A-z':
                    return view('teacher-page-for-superadmin', ['sort' => $AllUsersHaveRoleStudent->orderBy('name')->get()]);
                    break;
                case 'Z-a':
                    return view('teacher-page-for-superadmin', ['sort' => $AllUsersHaveRoleStudent->orderBy('name', 'desc')->get()]);
                    break;

                default:
                    return back();
                    break;
            }
        }
    }
    public function searchTeacher(Request $request)
    {
        if ($request['sorting'] === null) {
            return abort(404);
        } else {

            $Roles = Role::where('name', 'teacher')->first();
            $AllUsersHaveRoleStudent = User::where('department_id', auth()->user()->department_id)
                ->whereHas('roles', function ($query) use ($Roles) {
                    $query->where('name', $Roles->name);
                })
                ->where(function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%')
                        ->orWhere('email', 'like', '%' . $request->search . '%')
                        ->orWhere('phone', 'like', '%' . $request->search . '%');
                })
                ->select('name', 'email', 'phone', 'id')
                ->get();

            return view('teacher-page-for-superadmin', [
                'sort' => $AllUsersHaveRoleStudent
            ]);
        }
    }
    public function SortResearch(Request $request)
    {

        if ($request['sorting'] === null) {
            return abort(404);
        } else {


            $allResearch = Researchs::where('department_id', auth()->user()->department_id);
            switch ($request->sorting) {
                case 'Oldest':
                    return view('research-page-for-supatadmin', ['sort' => $allResearch->oldest()->get()]);
                    break;
                case 'Latest':
                    return view('research-page-for-supatadmin', ['sort' => $allResearch->Latest()->get()]);

                    break;
                case 'A-z':
                    return view('research-page-for-supatadmin', ['sort' => $allResearch->orderBy('student_name')->get()]);
                    break;
                case 'Z-a':
                    return view('research-page-for-supatadmin', ['sort' => $allResearch->orderBy('student_name', 'desc')->get()]);
                    break;

                default:
                    return back();
                    break;
            }
        }
    }
    public function searchResearch(Request $request)
    {
        if ($request['sorting'] === null) {
            return abort(404);
        } else {

            $allResearch = Researchs::where('department_id', auth()->user()->department_id)
                ->whereHas('teacher', function ($query) use ($request) {
                    $query->Where('status', 'like', '%' . $request->search . '%')
                        ->orWhere('student_name', 'like', '%' . $request->search . '%')
                        ->orWhere('title', 'like', '%' . $request->search . '%');
                })->with('teacher')->select('student_name', 'teacher_id', 'title', 'status', 'id')->get();
            return view('research-page-for-supatadmin', [
                'sort' => $allResearch
            ]);
        }
    }
    public function filter(Request $request)
    {
        if ($request['sorting'] === null) {
            return abort(404);
        } else {

            $researchFilter = Researchs::where('department_id', auth()->user()->department_id)
                ->Where('status', $request['statusfilter'])
                ->orWhere('teacher_id', $request['teacherfilter'])
                ->get();
            return view('research-page-for-supatadmin', ['sort' => $researchFilter]);
        }
    }
}
