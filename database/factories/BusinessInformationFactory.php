<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusinessInformation>
 */
class BusinessInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'phone' => fake()->phoneNumber,
            'email' => fake()->unique()->safeEmail,
            'location' => fake()->address,
            'latitude' => fake()->randomFloat(9, -90, 90),
            'longitude' => fake()->randomFloat(9, -180, 180),
        ];
    }
}
