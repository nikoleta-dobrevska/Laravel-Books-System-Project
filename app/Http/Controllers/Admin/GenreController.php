<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreStoreRequest;
use App\Models\Genre;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(): Factory|View|Application
    {
        $genres = Genre::all();
        return view('admin.genres.index', compact('genres'));
    }

    public function __invoke()
    {
        // ...
    }

    public function create()
    {
        return view('admin.genres.create');
    }

    public function store(GenreStoreRequest $request)
    {
        Genre::create([
            'name' => $request->name
        ]);

        return to_route('admin.genres.index')->with('success', 'The genre has been added successfully');
    }

    public function edit(Genre $genre)
    {
        return view('admin.genres.edit', compact('genre'));
    }

    public function update(GenreStoreRequest $request, Genre $genre)
    {
        $genre->update([
            'name' => $request->name
        ]);

        return to_route('admin.genres.index')->with('success', 'The genre has been updated successfully');
    }

    public function destroy(Genre $genre)
    {
        $genre->books()->detach();
        $genre->delete();

        return to_route('admin.genres.index')->with('danger', 'The genre has been deleted successfully');
    }
}
