<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;


use Illuminate\Support\Facades\Route;

Route::get('/Students', [StudentController::class, 'index']);
Route::get('/Teachers', [TeacherController::class, 'index']);


Route::get('/', function () {
    return view('welcome');
});
