<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResearchsController;


//student Route
Route::group(['middleware' => ['role:student', 'auth']], function () {
    Route::resource('research', ResearchsController::class)->except('index', 'create', 'show');
    Route::post('/upload-image', function (Request $request) {
        // Handle the image upload and return the image URL
        $uploadedFile = $request->file('file')->store('images', 'public');

        return response()->json(['location' => "/storage/$uploadedFile "]);
    });
});
