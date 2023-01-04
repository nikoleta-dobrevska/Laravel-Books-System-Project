<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Book;

class GuestBookController extends Controller
{
    public function index() {
        $books = Book::all();
        return view('books.index', compact('books'));
    }
}
