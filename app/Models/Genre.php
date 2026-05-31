<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['nama_genre', 'deskripsi', 'status'])]
class Genre extends Model
{
    public function movies(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}