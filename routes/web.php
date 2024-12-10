<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminController;



use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/Students', [StudentController::class, 'index']);
    Route::get('/teachers', [TeacherController::class, 'index']);
});

Route::get('/', function () {

    return view('welcome');
});
