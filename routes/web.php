<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user}', [UserController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/Students/{student}', [StudentController::class, 'show'])
       //->can('show', 'student')
        //->middleware('can:show,student')
        ->name('students.show');

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
