<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorStoreRequest;
use App\Models\Author;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function index(): Factory|View|Application
    {
        $authors = Author::all();
        return view('admin.authors.index', compact('authors'));
    }

    public function __invoke()
    {
        // ...
    }

    public function show($id)
    {
        //
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    public function store(AuthorStoreRequest $request)
    {
        $image = $request->file('image')->store('public/authors');

        Author::create([
            'name' => $request->name,
            'image' => $image
        ]);

        return to_route('admin.authors.index');
    }

    public function edit(Author $author)
    {
        return view('admin.authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $image = $author->image;

        if($request->hasFile('image'))
        {
            Storage::delete($author->image);
            $image = $request->file('image')->store('public/authors');
        }

        $author->update([
            'name' => $request->name,
            'image' => $image
        ]);

        return to_route('admin.authors.index');
    }

    public function destroy(Author $author)
    {
        Storage::delete($author->image);
        $author->delete();

        return to_route('admin.authors.index');
    }
}
