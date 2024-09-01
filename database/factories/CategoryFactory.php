<?php

namespace Database\Factories;

use App\Models\Category;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * The Faker instance with the Persian locale.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Create a Faker instance with the Persian locale
        $this->faker = FakerFactory::create('fa_IR');

        return [
            'name' => $this->faker->unique()->word,
            'parent_id' => $this->faker->randomElement([
                Category::factory(),
                null,
            ]),
            'description' => $this->faker->sentence,
        ];
    }
}
