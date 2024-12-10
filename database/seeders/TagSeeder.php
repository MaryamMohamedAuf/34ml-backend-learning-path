<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Student;
use App\Models\Teacher;

class TagSeeder extends Seeder
{
    public function run()
    {
        $tags = Tag::factory(5)->create();

        // Attach tags to students and teachers
        $tags->each(function ($tag) {
            $students = Student::inRandomOrder()->take(rand(1, 3))->get();
            $teachers = Teacher::inRandomOrder()->take(rand(1, 3))->get();

            $tag->students()->attach($students);
            $tag->teachers()->attach($teachers);
        });
    }
}
