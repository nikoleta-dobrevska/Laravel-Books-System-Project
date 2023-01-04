<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

        $input = $request->all();
        $genre_id = $input['genre_id'];
        $input['genre_id'] = implode(',', $genre_id);

        $inputTwo = $request->all();
        $author_id = $inputTwo['author_id'];
        $inputTwo['author_id'] = implode(',', $author_id);

        $book = Book::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'image' => $image,
            'pages' => $request->pages,
            'isbn' => $request->isbn,
            'publishing_date' => $request->publishing_date,
            $input,
            $inputTwo
        ]);

        if ($request->has('genre_id')) {
            $book->genres()->attach($request->genre_id);
        }

        if ($request->has('author_id')) {
            $book->authors()->attach($request->author_id);
        }

        return to_route('admin.books.index')->with('success', 'The book has been added successfully.');
    }

    public function edit(Book $book)
    {
        $genre_id = Genre::all();
        $author_id = Author::all();
        return view('admin.books.edit', compact('book', 'genre_id', 'author_id'));
    }

    public function update(Request $request, Book $book)
    {
        $input = $request->all();
        $genre_id = $input['genre_id'];
        $input['genre_id'] = implode(',', $genre_id);

        $inputTwo = $request->all();
        $author_id = $inputTwo['author_id'];
        $inputTwo['author_id'] = implode(',', $author_id);

        $request->validate([
            'title' => 'required|max:255',
            'isbn' => 'required|max:255',
            'pages' => 'required|integer|min:1|max:10000',
            'summary' => 'required',
            'publishing_date' => 'required|date',
            'image' => 'mimes:jpeg,png,jpg|max:1024'
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
            'summary' => $request->summary,
            'publishing_date' => $request->publishing_date,
            $input,
            $inputTwo
        ]);

        if ($request->has('genre_id')) {
            $book->genres()->sync($request->genre_id);
        }

        if ($request->has('author_id')) {
            $book->authors()->sync($request->author_id);
        }

        return to_route('admin.books.index')->with('success', 'The book has been updated successfully.');
    }

    public function destroy(Book $book)
    {
        Storage::delete($book->image);
        $book->genres()->detach();
        $book->authors()->detach();
        $book->delete();

        return to_route('admin.books.index')->with('success', 'The book has been deleted successfully.');
    }
}

