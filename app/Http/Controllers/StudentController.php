<?php

namespace App\Http\Controllers;

use App\Http\Filters\V1\QueryFilters;
use App\Http\Resources\StudentsResource;
use App\Models\Student;
use App\Models\Teacher;
use App\Http\Controllers\Api\V1\ApiController;
use Illuminate\Support\Facades\Gate;
use App\Http\Filters\V1\StudentFilters;

class StudentController extends ApiController
{

    public function index(StudentFilters $filters)
    {
//        [
//            'includes'=>'user',
//            'filters'=>[
//                'title'=>'malak',
//                'user_id'=>'14'
//            ]
//        ];
//        if($this->includes('user')){
//            return StudentsResource::collection(Student::with('user')->paginate());
//        }
       // return StudentsResource::collection(Student::all());
        return StudentsResource::collection(Student::filter($filters)->paginate());
    }


    public function show($id)
        {
            $student = Student::find($id);
        if($this->includes('user')){
            return new StudentsResource($student->load('user'));

        }
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


        public
        function index1()
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
