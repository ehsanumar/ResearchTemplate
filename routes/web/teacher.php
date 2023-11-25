<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

Route::group(['middleware' => ['role:teacher|super-admin', 'auth']], function () {
    Route::put('research/{id}/status', [TeacherController::class, 'ChangeStatus'])->name('ChangeStatus');
    Route::put('research/{id}/score', [TeacherController::class, 'AddScore'])->name('AddScore');
});
