<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::latest()->simplePaginate(3);

       return $student;
    }
}