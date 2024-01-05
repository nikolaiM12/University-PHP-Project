<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
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
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'author_id' => Author::factory()->create()->id,
            'category_id' => Category::factory()->create()->id,
            'description' => $this->faker->paragraph,
            'ISBN' => $this->faker->isbn13,
            'total_copies' => $this->faker->numberBetween(1, 10),
            'available_copies' => $this->faker->numberBetween(0, 5),
            'image' => $this->getRandomBookImage(),
        ];
    }

    private function getRandomBookImage(): string
    {
        // Можете да имате няколко различни URLs за снимки на книги
        $bookImages = [
            'https://thumbs.dreamstime.com/z/antique-book-isolated-26664745.jpg?w=200',
            'https://thumbs.dreamstime.com/z/open-book-isolated-white-16094903.jpg?w=200',
            'https://thumbs.dreamstime.com/z/book-isolated-7874920.jpg?w=200'
        ];

        // Връщане на случайно избрана снимка от масива със снимки на книги
        return $bookImages[array_rand($bookImages)];
    }
}
