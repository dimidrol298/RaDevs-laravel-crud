<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name(),
            'test_date' => $this->faker->dateTimeBetween('-30 days', '+30 days'),
            'test_location' => $this->faker->country(),
            'grade' => $this->faker->numberBetween(0, 100),
        ];
    }
}
