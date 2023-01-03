<?php

namespace Database\Seeders;

use App\Http\Controllers\GenreController;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AdminSeed::class);
        \App\Models\Author::factory(1)->create();
        \App\Models\Book::factory(1)->create();
        $this->call(GenreSeed::class);
    }
}
