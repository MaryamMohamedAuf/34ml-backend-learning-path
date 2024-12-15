<?php
namespace App\Policies;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Access\Response;
use App\Permissions\V1\Abilities;
class StudentPolicy
{

    public function show(User $user, Student $student)
    {
        Log::info('Policy check', [
            'user_id' => $user->id,
            'student_user_id' => $student->user_id,
        ]);
        if ($user->tokenCan(Abilities::ShowStudent)) {
            // Managers can view any student
            return true;
        }

        if ($user->tokenCan(Abilities::ShowAllStudent)) {
            // Ensure only their assigned students are viewable (if applicable)
            return $student->user_id === $user->id;
        }
       // return false; // Default deny
        return $user->tokenCan('student:show') ? true : false;

//        return $student->user_id === $user->id
//                ? Response::allow()
//                : Response::deny('You do not own this student.');

    }

}
