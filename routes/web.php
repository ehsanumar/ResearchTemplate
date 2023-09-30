<?php

use App\Models\User;
use App\Models\Researchs;
use App\Models\Department;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ResearchsController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\SuperAdminForStudentController;
use App\Http\Controllers\SuperAdminForTeacherController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // Get the "teacher" role
    $teacherRole = Role::where('name', 'teacher')->first();
    // Get the currently authenticated user's department_id
    $departmentId = auth()->user()->department_id;

    // Query users with the specified conditions
    $teachersInSameDepartment = User::whereHas('roles', function ($query) use ($teacherRole) {
        $query->where('name', $teacherRole->name);
    })->where('department_id', $departmentId)->pluck('name', 'id');
    //Students belonging to the department head
    $studentsOfDepartment = User::where('department_id', auth()->user()->department_id)
        ->whereHas('roles', function ($query) {
            $query->where('name', 'student');
        })
        ->count();
    $teacherOfDepartment = User::where('department_id', auth()->user()->department_id)
    ->whereHas('roles', function ($query) {
        $query->where('name', 'teacher')->OrWhere('name', 'super-admin');
    })
    ->count();
    $researchOfDepartment = Researchs::where('department_id', auth()->user()->department_id)->count();

    return view('Userdashboard', [
        'Researchs' => Researchs::with('teacher')->where('user_id', auth()->id())->select('title', 'teacher_id', 'status', 'id')->get(),
        'teachers' => $teachersInSameDepartment,
        'submetedResearchs' => Researchs::where('teacher_id', auth()->id())->select('title', 'student_name', 'status', 'id')->get(),
        'studentsOfDepartment' => $studentsOfDepartment,
        'teacherOfDepartment' => $teacherOfDepartment,
        'researchOfDepartment' => $researchOfDepartment,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//student Route
Route::group(['middleware' => ['role:student', 'auth']], function () {
    Route::resource('research', ResearchsController::class);
    Route::post('/upload-image' , function (Request $request) {
        // Handle the image upload and return the image URL
        $uploadedFile = $request->file('file')->store('images','public');

        return response()->json(['location' =>"/storage/$uploadedFile " ]); });
});
//teacher routes
Route::group(['middleware' => ['role:teacher|super-admin', 'auth']], function () {
    Route::put('research/{id}/status', [TeacherController::class, 'ChangeStatus'])->name('ChangeStatus');
    Route::get('/download-pdf/{id}', [TeacherController::class, 'DownloadPDF'])->name('downloadPdf');
});
Route::view('/download', 'PDF.sss');
Route::view('/TOC', 'toc');
// Super-admin Route
Route::group(['middleware' => ['role:super-admin', 'auth'] , 'prefix' => 'super-admin'], function () {
    Route::resource('student', SuperAdminForStudentController::class);
    Route::resource('teacher', SuperAdminForTeacherController::class);
    Route::get('researchs/department', function (){
        return view(
            'research-page-for-supatadmin',
            ['Researchs' =>
            Researchs::where('department_id', auth()->user()->department_id)
                ->select('student_name', 'teacher_id', 'title', 'status', 'id')
                ->latest()
                ->get()]
        );
    })->name('researchMyDepartment');
});
require __DIR__ . '/auth.php';