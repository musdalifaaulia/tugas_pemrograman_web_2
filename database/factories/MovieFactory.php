<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => fake()->sentence(3),
            'sutradara' => fake()->name(),
            'tahun_rilis' => fake()->year(),
            'durasi' => fake()->numberBetween(80,180),
            'rating' => fake()->randomFloat(1,1,10),
        ];
    }
}
