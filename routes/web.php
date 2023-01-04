<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Guest\GuestAuthorController;
use App\Http\Controllers\Guest\GuestBookController;
use App\Http\Controllers\Guest\GuestGenreController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/genres', [GuestGenreController::class, 'index'])->name('genres.index');
Route::get('/authors', [GuestAuthorController::class, 'index'])->name('authors.index');
Route::get('/books', [GuestBookController::class, 'index'])->name('books.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::resource('/users', UserManagementController::class);
        Route::resource('/books', BookController::class);
        Route::resource('/authors', AuthorController::class);
        Route::resource('/genres', GenreController::class);
    });
});
