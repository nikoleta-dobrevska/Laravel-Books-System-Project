<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
}
