<?php

namespace App\Providers;

use App\Models\Student;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use App\Policies\StudentPolicy;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [

    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Gate::policy(Student::class, StudentPolicy::class);

        // phpinfo();
//        Gate::define('isStudent', function ($user, $student) {
//            return  $student->user_id == auth()->id();
//        });
       // Model::preventLazyLoading();
    }
}
