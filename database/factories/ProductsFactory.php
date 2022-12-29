<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->words(2 , true);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->sentences(5),
            'image' => $this->faker->imageUrl(800,600),
            'price' => $this->faker->randomFloat(1,1,499),
            'compare_price' => $this->faker->randomFloat(1,500,999),
            'featured' => rand(0,1),
            'category_id' => $this->faker->inRandomOrder()->first()->id,
            'store_id' => $this->faker->inRandomOrder()->first()->id,

        ];
    }
}
