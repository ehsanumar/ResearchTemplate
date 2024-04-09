<?php
use App\Models\Researchs;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SortAndSearchController;
use App\Http\Controllers\SuperAdminForStudentController;
use App\Http\Controllers\SuperAdminForTeacherController;



Route::group(['middleware' => ['role:super-admin', 'auth'], 'prefix' => 'super-admin'], function () {
    Route::resource('student', SuperAdminForStudentController::class)->only('index', 'update', 'destroy');
    Route::resource('teacher', SuperAdminForTeacherController::class)->only('index', 'update', 'destroy');
    Route::controller(SortAndSearchController::class)
    ->group(function (){
        Route::match(['get', 'post'], '/sorting/student',  'SortStudent')->name('sortStudent');
        Route::match(['get', 'post'],'/search/student',  'searchStudent' )->name('searchStudent');
        Route::match(['get', 'post'],'/sorting/teacher',  'SortTeacher')->name('sortTeacher');
        Route::match(['get', 'post'],'/search/teacher',  'searchTeacher')->name('searchTeacher');
        Route::match(['get', 'post'],'/sorting/research',  'SortResearch')->name('sortResearch');
        Route::match(['get', 'post'],'/search/research',  'searchResearch')->name('searchResearch');
    Route::match(['get', 'post'],'/filter/research',  'filter')->name('filterResearch');
    });
    Route::get('researchs/department', function () {
        return view(
            'research-page-for-supatadmin',
            [
                'Researchs' =>
                Researchs::CheckDepartment()
                    ->with('teacher')
                    ->select('student_name', 'teacher_id', 'title', 'status','score', 'id')
                    ->latest()
                    ->paginate(5),
            ]
        );
    })->name('researchMyDepartment');
});
