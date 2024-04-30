<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->word(),
            'genres' => 'Horror,Mystery,Drama',
            'author' => fake()->name(),
            'year' => fake()->year(),
            'publisher' => fake()->company(),
            'language' => 'English',
            'description' => fake()->paragraph(5),
            'rating' => fake()->randomFloat(1, 0, 10),
        ];
    }
}
