<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = $this->faker->numberBetween(1000000, 10000000);
        return [
            'name' => $this->faker->unique()->persianWords($nb = 3, $asText = true),
            'image' => 'images/products/default-product-image.jpg',
            'price' => $price,
            'discounted_price'=> $price,
            'quantity' => $this->faker->numberBetween(1, 1000),
            'description' => $this->faker->persianParagraph(),
            'status' => 'active',
            'category_id' => Category::query()->inRandomOrder()->value('id')
        ];
    }
}
