<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentsResource;
use App\Models\Student;
use App\Models\Teacher;

use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
{
    public function index()
    {
       return StudentsResource::collection(Student::all());

    }
    public function show($id)
    {
        $student = Student::find($id);
//        if(auth()->user()->can('isStudent', $student)){
//            return $student;
//        }
//        Gate::authorize('isStudent', $student);

//        if ($student->user_id !== auth()->id()) {
//            abort(403);
//        }
      //  return $student;
        return new StudentsResource($student);
    }
    public function index1()
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
