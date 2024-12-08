<?php
use App\Http\Controllers\StudentController;

use Illuminate\Support\Facades\Route;

Route::get('/Students', [StudentController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});
