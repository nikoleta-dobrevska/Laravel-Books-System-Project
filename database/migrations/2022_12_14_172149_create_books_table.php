<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('isbn');
            $table->integer('pages');
            $table->longText('summary');
            $table->string('image');
            $table->foreignId('user_id')->nullable()->constrained()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('author_id')->nullable()->constrained()->references('id')->on('authors')->onDelete('cascade');
            $table->foreignId('genre_id')->nullable()->constrained()->references('id')->on('genres')->onDelete('cascade');
            $table->foreignId('image_id')->nullable()->constrained()->references('id')->on('images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
