<?php
use App\Models\Researchs;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SortAndSearchController;
use App\Http\Controllers\SuperAdminForStudentController;
use App\Http\Controllers\SuperAdminForTeacherController;



Route::group(['middleware' => ['role:super-admin', 'auth'], 'prefix' => 'super-admin'], function () {
    Route::resource('student', SuperAdminForStudentController::class)->only('index', 'update', 'destroy');
    Route::resource('teacher', SuperAdminForTeacherController::class)->only('index', 'update', 'destroy');
    Route::post('/sorting/student', [SortAndSearchController::class, 'SortStudent'])->name('sortStudent');
    Route::post('/search/student', [SortAndSearchController::class, 'searchStudent'])->name('searchStudent');
    Route::post('/sorting/teacher', [SortAndSearchController::class, 'SortTeacher'])->name('sortTeacher');
    Route::post('/search/teacher', [SortAndSearchController::class, 'searchTeacher'])->name('searchTeacher');
    Route::post('/sorting/research', [SortAndSearchController::class, 'SortResearch'])->name('sortResearch');
    Route::post('/search/research', [SortAndSearchController::class, 'searchResearch'])->name('searchResearch');
    Route::post('/filter/research', [SortAndSearchController::class, 'filter'])->name('filterResearch');
    Route::get('researchs/department', function () {
        $teacherRole = Role::where('name', 'teacher')->first();
        return view(
            'research-page-for-supatadmin',
            [
                'Researchs' =>
                Researchs::where('department_id', auth()->user()->department_id)
                    ->select('student_name', 'teacher_id', 'title', 'status', 'id')
                    ->latest()
                    ->get(),
            ]
        );
    })->name('researchMyDepartment');
});
