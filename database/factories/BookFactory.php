<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'       => $this->faker->sentence(3, true),
            'description' => $this->faker->sentence(3, true),
            'price'       => $this->faker->numberBetween($min = 25, $max = 150),
            'author_id'   => $this->faker->numberBetween($min = 1, $max = 31),
        ];
    }
}