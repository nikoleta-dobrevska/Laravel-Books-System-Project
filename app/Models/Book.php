<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    use HasFactory;

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'authors_books');
    }

    public function genre(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'books_genres');
    }

    public function image(): HasOne
    {
        return $this->hasOne(Image::class,'id');
    }

}
