<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Permissions\V1\Abilities;
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user}', [UserController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/Students/{student}', [StudentController::class, 'show'])
     //  ->can('show', 'student')
        ->name('students.show');

    Route::get('/Students', [StudentController::class, 'index']);

    Route::get('/Teachers', [TeacherController::class, 'index']);
});

Route::get('/', function () {

    return view('welcome');
});
Route::get('/token', function () {
    $user = auth()->user(); // Get the logged-in user
   // $tokens = $user->createToken('token')->plainTextToken;
$ab = $user->createToken('token', ['student:show']);
   // return ($tokens);
   return ($ab);
});
Route::middleware('auth:sanctum')->get('/tokens2', function () {
    $user = auth()->user();
    $currentToken = $user->currentAccessToken(); // Fetch the token being used
    if (!$currentToken) {
        return response()->json(['error' => 'Token not found'], 404);
    }
    $abilities = $currentToken->abilities; // Use the token's abilities
    return [
        'token' => $currentToken,
        'abilities' => $abilities ?? 'No abilities assigned to this token',
    ];
});
Route::middleware('auth:sanctum')->get('/tokens', function () {
    $user = auth()->user();
    $currentToken = $user->currentAccessToken();

    if ($currentToken instanceof \Laravel\Sanctum\TransientToken) {
        return response()->json([
            'message' => 'Authenticated via session, no token abilities available.',
        ]);
    }

    $abilities = $currentToken->abilities ?? [];
    return [
        'tokens' => $user->tokens,
        'abilities' => $abilities,
    ];
});


