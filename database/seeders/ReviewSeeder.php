<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        Movie::all()->each(function ($movie) {
            Review::factory(5)->create([
                'movie_id' => $movie->id,
            ]);
        });
    }
}