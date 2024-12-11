<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;



use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/Students/{id}', [StudentController::class, 'show']);
    Route::get('/Students', [StudentController::class, 'index']);

    Route::get('/Teachers', [TeacherController::class, 'index']);
});

Route::get('/', function () {

    return view('welcome');
});
Route::get('/token', function () {

    $user = auth()->user(); // Get the logged-in user
    $tokens = $user->createToken('token')->plainTextToken;
    return ($tokens);
});

Route::middleware('auth:sanctum')->get('/tokens', function () {
    return auth()->user()->tokens;
});
