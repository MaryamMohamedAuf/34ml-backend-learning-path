<?php

namespace App\Http\Controllers;

use App\Http\Filters\V1\QueryFilters;
use App\Http\Resources\StudentsResource;
use App\Models\Student;
use App\Http\Controllers\Api\V1\ApiController;
use Illuminate\Support\Facades\Gate;
use App\Http\Filters\V1\StudentFilters;
use Illuminate\Support\Facades\Auth;
use App\Policies\StudentPolicy;
class StudentController extends ApiController
{
    protected $policyClass = StudentPolicy::class;
    public function index(StudentFilters $filters)
    {
//        if($this->includes('user')){
//            return StudentsResource::collection(Student::with('user')->paginate());
//        }
       // return StudentsResource::collection(Student::all());
        return StudentsResource::collection(Student::filter($filters)->paginate());
    }

    public function show($id)
        {
            $user = Auth::user();
            if (!$user) {
                abort(403, 'Unauthenticated');
            }
            $student = Student::find($id);
            if (!$student) {
                abort(404, 'Student not found');
            }
            $this->isAble('show', $student);
                //return $user->tokenCan('student:show') ? true : false;
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
