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
    return view('Userdashboard', [
        'Researchs' => Researchs::with(['teacher'])
        ->where('user_id', auth()->id())
        ->latest()
        ->select('title', 'teacher_id', 'status','score', 'id')
        ->paginate(4),
        // Query users with the specified conditions
        //in user model i creat a fn to get user if teacher and if user in this department
        'teachers' => User::CheckDepartment()
        ->RoleUserTarget('teacher')
        ->with(['roles'])
        ->pluck('name', 'id'),

        'submetedResearchs' => Researchs::where('teacher_id', auth()->id())
        ->select('score','title', 'student_name', 'status', 'id')
        ->paginate(10),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')
->controller(ProfileController::class)
->name('profile.')
->group(function () {
    Route::get('/profile', 'edit')->name('edit');
    Route::patch('/profile', 'update')->name('update');
    Route::delete('/profile', 'destroy')->name('destroy');
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
