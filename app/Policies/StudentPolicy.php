<?php
namespace App\Policies;
use App\Models\Student;
use App\Models\User;

class StudentPolicy
{
//    public function show1(Student $student, User $user): bool
//    {
//        $student = $student->user_id == auth()->id();
//        // return $student->user_id == auth()->id();
//        //return $student->user->is($user);
//        // dd(auth()->id());
//        return $student;
//    }

    public function show(User $user, Student $student): bool
    {
        //dd($user->id, $student->user_id);
        return $student->user_id === $user->id;
    }
}
