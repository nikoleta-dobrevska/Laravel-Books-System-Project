<?php

namespace App\Http\Controllers;

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

        return to_route('admin.genres.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Genre $genre)
    {
        return view('admin.genres.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $genre->update([
            'name' => $request->name
        ]);

        return to_route('admin.genres.index');
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();

        return to_route('admin.genres.index');
    }
}
