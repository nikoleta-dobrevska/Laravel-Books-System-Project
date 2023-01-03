<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=> 'It',
            'isbn' => '9789542722380',
            'pages' => '695',
            'summary' => 'Seven young outcasts in Derry, Maine, are about to face their worst nightmare — an ancient, shape-shifting evil that emerges from the sewer every 27 years to prey on children. Banding together over the course of one horrifying summer, the friends must overcome their own personal fears to battle the murderous, bloodthirsty clown known as Pennywise.',
            'publishing_date'=>'1986-09-15',
            'image' => $this->faker->image(storage_path('app/public/authors',50,50,null,false))
        ];
    }
}
