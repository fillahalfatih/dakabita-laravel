<?php

namespace Database\Factories;

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
        return [
            'slug' => $this->faker->slug(),
            'image' => $this->faker->imageUrl(),
            'name' => $this->faker->sentence(mt_rand(1, 3)),
            'description' => collect($this->faker->paragraphs(mt_rand(10, 16)))->map(fn ($p) => "<p>$p</p>")->implode(''),
            'price' => $this->faker->randomNumber(5, true),
            'composition' => $this->faker->sentence(mt_rand(10, 15)),
            'netto' => $this->faker->randomNumber(3, true),
            'category_id' => mt_rand(1, 3)
        ];
    }
}
