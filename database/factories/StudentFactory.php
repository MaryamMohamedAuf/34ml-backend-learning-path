<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\User;

class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition()
    {
        return [
            'user_id' => User::factory()->create()->id,
            'name' => $this->faker->name,
            'age' => $this->faker->numberBetween(18, 25),
        ];
    }
}
