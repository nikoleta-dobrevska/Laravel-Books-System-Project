<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image'];
    public $timestamps = false;

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'authors_books');
    }

}
