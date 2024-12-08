<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class TeacherController extends Controller
{
    public function index()
    {

        
        $teachers = Teacher::with('tags')->get();
        foreach ($teachers as $teacher) {
            echo $teacher->name . " Tags:\n";
            foreach ($teacher->tags as $tag) {
                echo "- " . $tag->name . "\n";
            }
        }
}
}
