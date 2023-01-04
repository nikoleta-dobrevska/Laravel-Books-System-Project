<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Genre;

class GuestGenreController extends Controller
{
    public function index() {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

}
