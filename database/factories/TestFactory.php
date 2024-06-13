<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Subjects;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::where('class', 1)->inRandomOrder()->first()->id,
            'subject_id' => Subjects::all()->except([5, 8])->inRandomOrder()->first()->id,
            'note' => $this->faker->randomFloat(2, 1, 20),
            'quarter' => 1,
        ];
    }
}
