<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'isbn', 'pages', 'image', 'summary','genre_id','author_id'];

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'authors_books');
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'books_genres');
    }
}
