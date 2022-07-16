<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'author_id' => rand(1, Author::all()->count()),
            'cover' => $this->faker->randomElement([Null, Null, 'a.jpg', 'b.webp', 'c.jpg']),
            'likes' => 0
        ];
    }
}
