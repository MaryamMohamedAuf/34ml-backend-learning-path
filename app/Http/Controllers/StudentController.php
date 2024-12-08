<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all(); // Fetch all students (1 query)
foreach ($students as $student) {
    $comments = $student->comments; // Query for each student's comments
    echo $student->name . "'s Comments:\n";
    foreach ($comments as $comment) {
        echo "- " . $comment->content . "\n";
    }
}


       $students = Student::with('comments')->get(); //Eager Loading
    
    foreach ($students as $student) {
    echo $student->name . "'s Comments:\n";
    foreach ($student->comments as $comment) {
        echo "- " . $comment->content . "\n";
    }
}
    }
}