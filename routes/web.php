<?php

use App\Models\User;
use App\Models\Researchs;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::view('/', 'welcome');


Route::get('/dashboard', function () {

    // Query users with the specified conditions
    //in user model i creat a fn to get user if teacher and if user in this department
    $teachersInSameDepartment=User::teachersInSameDepartment()->pluck('name', 'id');

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
        'Researchs' => Researchs::with('teacher')->where('user_id', auth()->id())->select('title', 'teacher_id', 'status', 'id')->latest()->paginate(1),
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

Route::get('/download-pdf/{id}', [TeacherController::class, 'DownloadPDF'])->name('downloadPdf')->middleware('auth');
Route::view('/download', 'PDF.sss');

//student Route
require __DIR__ . '/web/student.php';

//teacher routes
require __DIR__ . '/web/teacher.php';

// Super-admin Route
require __DIR__ . '/web/superAdmin.php';

require __DIR__ . '/auth.php';
// to users when Register with OAuth Google Authentication
    //add info
Route::put('/fillAdditionalInfo', [RegisteredUserController::class, 'showAdditionalInfoForm'])
    ->middleware(['auth'])
    ->name('fillAdditionalInfo');

// OAuth login routes
Route::middleware(['guest'])->group(function () {
    Route::get('auth/google/redirect', [AuthenticatedSessionController::class,'redirectToGoogle'])->name('google.login');
    Route::get('auth/google/callback', [AuthenticatedSessionController::class, 'handleGoogleCallback'])->name('google.login.callback');
});
