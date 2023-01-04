<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Author;

class GuestAuthorController extends Controller
{
    public function index() {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }
}
