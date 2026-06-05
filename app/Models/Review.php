<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable([
    'nama_pengguna',
    'komentar',
    'rating',
    'tanggal_review',
    'genre_id',
    'gender'
])]

class Review extends Model
{
    use HasFactory, SoftDeletes;

    
    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
}