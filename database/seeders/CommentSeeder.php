<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Student;
use App\Models\Teacher;

class CommentSeeder extends Seeder
{
    public function run()
    {
        // Add comments to students
        Student::all()->each(function ($student) {
            Comment::factory(rand(1, 3))->create([
                'commentable_id' => $student->id,
                'commentable_type' => Student::class,
            ]);
        });

        // Add comments to teachers
        Teacher::all()->each(function ($teacher) {
            Comment::factory(rand(1, 3))->create([
                'commentable_id' => $teacher->id,
                'commentable_type' => Teacher::class,
            ]);
        });
    }
}
