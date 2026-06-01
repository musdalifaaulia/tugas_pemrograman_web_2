<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        Genre::all()->each(function ($genre) {
            Review::factory(5)->create([
                'genre_id' => $genre->id,
            ]);
        });
    }
}