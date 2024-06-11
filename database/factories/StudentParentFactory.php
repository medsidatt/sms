<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentParentFactory extends Factory
{

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'nni' => $this->faker->randomNumber(8),
            'tel' => $this->faker->randomNumber(8),
            'sex' => 'M',
            'date_of_birth' => '2010-12-12',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
