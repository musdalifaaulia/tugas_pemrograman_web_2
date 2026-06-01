<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'nama_pengguna' => fake()->name(),
        'komentar' => fake()->randomElement([
            'Film ini sangat menarik dan seru untuk ditonton.',
            'Alur cerita cukup bagus dan mudah dipahami.',
            'Aktor dan aktris bermain dengan sangat baik.',
            'Efek visualnya sangat memukau.',
            'Film ini layak mendapatkan rating tinggi.',
            'Ceritanya sedikit membosankan di bagian tengah.',
            'Musik latarnya sangat mendukung suasana film.',
            'Salah satu film terbaik yang pernah saya tonton.',
            'Karakter dalam film ini sangat berkesan.',
            'Akhir cerita sangat mengejutkan dan menarik.'
        ]),        'rating' => fake()->numberBetween(1, 10),
        'tanggal_review' => fake()->date(),
        'genre_id' => Genre::inRandomOrder()->first()->id,

        ];
    }
}
