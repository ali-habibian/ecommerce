<?php

namespace Database\Factories;

use App\Models\Category;
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
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->persianWords($nb = 3, $asText = true),
            'parent_id' => $this->faker->randomElement([
                Category::factory(),
                null,
            ]),
            'description' => $this->faker->persianSentence($nb = 3, $variableNbWords = true),
        ];
    }
}
