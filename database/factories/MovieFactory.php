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
            'judul' => fake()->randomElement([
            'Laskar Pelangi',
            'Dilan 1990',
            'Pengabdi Setan',
            'KKN di Desa Penari',
            'Habibie dan Ainun',
            'Miracle in Cell No 7',
            'Ngeri Ngeri Sedap',
            'Yowis Ben',
            'Suzzanna',
            'Sang Pencerah']),
            'sutradara' => fake()->name(),
            'tahun_rilis' => fake()->year(),
            'durasi' => fake()->numberBetween(80,180),
            'rating' => fake()->randomFloat(1,1,10),
        ];
    }
}
