<?php
namespace App\Providers;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Student;
use App\Policies\StudentPolicy;

class AuthServiceProvider extends ServiceProvider
{
protected $policies = [
Student::class => StudentPolicy::class,
];

public function boot()
{
    $this->registerPolicies(); // Ensure policies are registered
    Gate::policy(Student::class, StudentPolicy::class);
}
}
