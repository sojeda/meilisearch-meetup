<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Lightit\Backoffice\Books\Domain\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'author_id' => UserFactory::new(),
            'description' => $this->faker->paragraph,
            'category_id' => CategoryFactory::new(),
            'price' => $this->faker->randomNumber(),
        ];
    }
}
