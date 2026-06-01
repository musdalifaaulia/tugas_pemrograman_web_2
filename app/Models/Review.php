<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pengguna',
        'komentar',
        'rating',
        'tanggal_review',
        'genre_id'
    ];

    protected $with = ['genre'];

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
}