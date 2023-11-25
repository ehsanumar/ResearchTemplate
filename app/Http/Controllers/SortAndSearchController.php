<?php

namespace App\Http\Controllers;

use App\Models\Researchs;
use App\Models\User;
use Illuminate\Http\Request;

class SortAndSearchController extends Controller
{
    public function SortStudent(Request $request)
    {
        abort_if($request['sorting'] === null, 404);
        $AllUsersHaveRoleStudent = User::select('name', 'email', 'phone', 'id')
            ->with(['roles'])
            ->CheckDepartment()
            ->RoleUserTarget('student');

        switch ($request->sorting) {
            case 'Oldest':
                return view('student-page-for-superadmin', ['sort' =>
                $AllUsersHaveRoleStudent
                ->oldest()
                ->paginate(15)]);
                break;
            case 'Latest':
                return view('student-page-for-superadmin', ['sort' =>
                $AllUsersHaveRoleStudent
                ->Latest()
                ->paginate(15)]);
                break;
            case 'A-z':
                return view('student-page-for-superadmin', ['sort' =>
                 $AllUsersHaveRoleStudent
                 ->orderBy('name')
                 ->paginate(15)]);
                break;
            case 'Z-a':
                return view('student-page-for-superadmin', ['sort' =>
                $AllUsersHaveRoleStudent
                ->orderBy('name', 'desc')
                ->paginate(15)]);
                break;

            default:
                return back();
                break;
        }
    }
    public function searchStudent(Request $request)
    {


        $AllUsersHaveRoleStudent = User::CheckDepartment()
            ->RoleUserTarget('student')
            ->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('phone', 'like', '%' . $request->search . '%');
            })
            ->select('name', 'email', 'phone', 'id')
            ->paginate(15);

        return view('student-page-for-superadmin', [
            'sort' => $AllUsersHaveRoleStudent

        ]);
    }
    public function SortTeacher(Request $request)
    {
        abort_if($request['sorting'] === null, 404);

        $AllUsersHaveRoleStudent = User::CheckDepartment()
            ->with(['roles'])
            ->RoleUserTarget('teacher')
            ->select('name', 'email', 'phone', 'id');

        switch ($request->sorting) {
            case 'Oldest':
                return view('teacher-page-for-superadmin', ['sort' => $AllUsersHaveRoleStudent->oldest()->paginate(15)]);
                break;
            case 'Latest':
                return view('teacher-page-for-superadmin', ['sort' => $AllUsersHaveRoleStudent->Latest()->paginate(15)]);

                break;
            case 'A-z':
                return view('teacher-page-for-superadmin', ['sort' => $AllUsersHaveRoleStudent->orderBy('name')->paginate(15)]);
                break;
            case 'Z-a':
                return view('teacher-page-for-superadmin', ['sort' => $AllUsersHaveRoleStudent->orderBy('name', 'desc')->paginate(15)]);
                break;

            default:
                return back();
                break;
        }
    }
    public function searchTeacher(Request $request)
    {

        $AllUsersHaveRoleStudent = User::CheckDepartment()
            ->RoleUserTarget('teacher')
            ->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('phone', 'like', '%' . $request->search . '%');
            })
            ->select('name', 'email', 'phone', 'id')
            ->paginate(15);

        return view('teacher-page-for-superadmin', [
            'sort' => $AllUsersHaveRoleStudent
        ]);
    }
    public function SortResearch(Request $request)
    {
        abort_if($request['sorting'] === null, 404);
        $allResearch = Researchs::CheckDepartment();
        switch ($request->sorting) {
            case 'Oldest':
                return view('research-page-for-supatadmin', ['sort' => $allResearch->oldest()->paginate(5)]);
                break;
            case 'Latest':
                return view('research-page-for-supatadmin', ['sort' => $allResearch->Latest()->paginate(5)]);

                break;
            case 'A-z':
                return view('research-page-for-supatadmin', ['sort' => $allResearch->orderBy('student_name')->paginate(5)]);
                break;
            case 'Z-a':
                return view('research-page-for-supatadmin', ['sort' => $allResearch->orderBy('student_name', 'desc')->paginate(5)]);
                break;

            default:
                return back();
                break;
        }
    }
    public function searchResearch(Request $request)
    {

        $allResearch = Researchs::CheckDepartment()
            ->whereHas('teacher', function ($query) use ($request) {
                $query->Where('status', 'like', '%' . $request->search . '%')
                    ->orWhere('student_name', 'like', '%' . $request->search . '%')
                    ->orWhere('title', 'like', '%' . $request->search . '%');
            })->with('teacher')->select('student_name', 'teacher_id', 'title', 'status', 'id')->paginate(5);
        return view('research-page-for-supatadmin', [
            'sort' => $allResearch
        ]);
    }
    public function filter(Request $request)
    {
        $researchFilter = Researchs::CheckDepartment()
            ->Where('status', $request['statusfilter'])
            ->orWhere('teacher_id', $request['teacherfilter'])
            ->paginate(5);
        return view('research-page-for-supatadmin', ['sort' => $researchFilter]);
    }
}
