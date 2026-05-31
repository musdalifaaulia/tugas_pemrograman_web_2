<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'nama_pengguna',
    'komentar',
    'rating',
    'tanggal_review',
    'movie_id'
])]
class Review extends Model
{
    use HasFactory;

    protected $with = ['movie'];

    public function movie(): BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}