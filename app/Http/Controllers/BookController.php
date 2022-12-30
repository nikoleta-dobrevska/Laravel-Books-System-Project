<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function create()
    {
        $genre_id = Genre::all();
        $author_id = Author::all();
        return view('admin.books.create', compact('genre_id', 'author_id'));
    }

    public function store(BookStoreRequest $request): RedirectResponse
    {
        $image = $request->file('image')->store('public/books');

        $book = Book::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'image' => $image,
            'pages' => $request->pages,
            'isbn' => $request->isbn,
            'genre_id' => $request->genre_id,
            'author_id' => $request->author_id
        ]);

        if ($request->has('genre_id')) {
            $book->genres()->attach($request->genre_id);
        }

        if ($request->has('author_id')) {
            $book->authors()->attach($request->author_id);
        }

        return to_route('admin.books.index')->with('success', 'Book added successfully.');
    }

    public function edit(Book $book)
    {
        $genres = Genre::all();
        $authors = Author::all();
        return view('admin.books.edit', compact('book', 'genres', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'isbn' => 'required',
            'pages' => 'required',
            'summary' => 'required'
        ]);

        $image = $book->image;

        if ($request->hasFile('image')) {
            Storage::delete($book->image);
            $image = $request->file('image')->store('public/books');
        }

        $book->update([
            'title' => $request->title,
            'isbn' => $request->isbn,
            'pages' => $request->pages,
            'image' => $image,
            'summary' => $request->summary
        ]);

        if ($request->has('genres')) {
            $book->genres()->sync($request->genres);
        }

        if ($request->has('authors')) {
            $book->authors()->sync($request->authors);
        }

        return to_route('admin.books.index');
    }

    public function destroy(Book $book)
    {
        Storage::delete($book->image);
        $book->genres()->detach();
        $book->authors()->detach();
        $book->delete();

        return to_route('admin.books.index');
    }
}

