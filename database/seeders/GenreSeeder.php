<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        $genres =
        [
            [
                'nama_genre' => 'Action',
                'deskripsi' => 'Film dengan adegan aksi dan pertarungan',
                'status' => 'Aktif',
            ],
            [
                'nama_genre' => 'Drama',
                'deskripsi' => 'Film yang berfokus pada cerita dan emosi',
                'status' => 'Aktif',
            ],
            [
                'nama_genre' => 'Comedy',
                'deskripsi' => 'Film yang menghibur dan mengundang tawa',
                'status' => 'Aktif',
            ],
            [
                'nama_genre' => 'Horror',
                'deskripsi' => 'Film yang menghadirkan suasana menegangkan',
                'status' => 'Aktif',
            ],
            [
                'nama_genre' => 'Romance',
                'deskripsi' => 'Film bertema percintaan',
                'status' => 'Aktif',
            ],
            [
                'nama_genre' => 'Thriller',
                'deskripsi' => 'Film penuh misteri dan ketegangan',
                'status' => 'Aktif',
            ],
            [
                'nama_genre' => 'Adventure',
                'deskripsi' => 'Film petualangan di berbagai tempat',
                'status' => 'Aktif',
            ],
            [
                'nama_genre' => 'Fantasy',
                'deskripsi' => 'Film dengan unsur dunia imajinasi',
                'status' => 'Aktif',
            ],
            [
                'nama_genre' => 'Sci-Fi',
                'deskripsi' => 'Film bertema ilmu pengetahuan dan teknologi',
                'status' => 'Aktif',
            ],
            [
                'nama_genre' => 'Animation',
                'deskripsi' => 'Film animasi untuk berbagai kalangan',
                'status' => 'Aktif',
            ],
        ];

        foreach ($genres as $genre)
        {
            Genre::create($genre);
        }
    }
}