<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    public function show($id)
    {
        $student = Student::find($id);
        if ($student->user_id !== auth()->id()) {
            abort(403);
        }
        return $student;
    }
    public function index()
    {
        $students = Student::with('tags')->get();

        foreach ($students as $student) {

            echo $student->name . " Tags:\n";
            foreach ($student->tags as $tag) {
                echo "- " . $tag->name . "\n";
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
