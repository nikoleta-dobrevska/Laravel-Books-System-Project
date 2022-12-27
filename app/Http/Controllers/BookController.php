<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(): Factory|View|Application
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    public function __invoke()
    {
        // ...
    }

    public function create(): Factory|View|Application
    {
        return view('admin.books.create');
    }
}
