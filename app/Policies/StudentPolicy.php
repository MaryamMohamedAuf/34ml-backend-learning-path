<?php
namespace App\Policies;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Access\Response;

class StudentPolicy
{

    public function show(User $user, Student $student)
    {
        Log::info('Policy check', [
            'user_id' => $user->id,
            'student_user_id' => $student->user_id,
        ]);
        return $student->user_id === $user->id
                ? Response::allow()
                : Response::deny('You do not own this student.');
    }

}
