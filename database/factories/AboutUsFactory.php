<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AboutUs>
 */
class AboutUsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
               'position' => fake()->randomElement(['top', 'middle', 'bottom']),
            'photo_left' => fake()->imageUrl(),
            'photo_right' => fake()->optional()->imageUrl(),
            'content' => fake()->paragraphs(3, true),
            'title' => fake()->sentence(),
           
        ];
    }
}
