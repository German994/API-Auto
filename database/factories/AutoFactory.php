<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'marca' => $this->faker->firstName(),
            'modelo' => $this->faker->lastName(),
            'color' => $this->faker->safeColorName(),
            'puertas' => $this->faker->random_int(2, 4),
            'cilindrado' => $this->faker->randomDigit(),
            'automatico' => $this->faker->numberBetween($min = 0, $max = 1),
            'elecrtico' => $this->faker->numberBetween($min = 0, $max = 1)
        ];
    }
}
