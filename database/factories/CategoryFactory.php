<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       $name = $this->faker->department;
       return [
           'name' => $name,
           'slug' => Str::slug($name),
           'description' => $this->faker->sentence(15),
           'logo_image' => $this->faker->imageUrl(300,300),
           'cover_image' => $this->faker->imageUrl(800,600),
       ];
    }
}
