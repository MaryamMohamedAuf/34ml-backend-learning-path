<?php
namespace App\Providers;
use App\Models\Student;
use App\Policies\StudentPolicy;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Student::class => StudentPolicy::class,
    ];
}
