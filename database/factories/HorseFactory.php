<?php

namespace Database\Factories;

use App\Models\Horse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Horse>
 */
class HorseFactory extends Factory
{
    public function definition(): array
    {
        return [
        'name' => fake()->name(),
        'age' => fake()->numberBetween(0, 100),
        'win_races' => fake()->numberBetween(0, 100),
        'share' => fake()->numberBetween(0, 1000),
        ];
    }
}
