<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'isbn', 'pages', 'image', 'summary','publishing_date'];
    public $timestamps = false;
    protected $dates = ['publishing_date'];

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'authors_books');
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'books_genres');
    }
}
