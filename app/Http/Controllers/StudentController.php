<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    public function index()
    {
       
       $students = Student::with('comments')->get(); //Eager Loading
    
    foreach ($students as $student) {
    echo $student->name . "'s Comments:\n";
    foreach ($student->comments as $comment) {
        echo "- " . $comment->content . "\n";
    }
}
    }
}