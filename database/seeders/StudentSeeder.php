<?php
use App\Models\Student;
use App\Models\Comment;

Student::factory(5)->create()->each(function ($student) {
    $student->comments()->createMany([
        ['content' => 'Great student!'],
        ['content' => 'Needs improvement.'],
    ]);
});


?>