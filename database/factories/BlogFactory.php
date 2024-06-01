<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
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
            'slug' => Str::slug($this->faker->unique()->sentence),
            'content' => $this->faker->paragraphs(3, true),
            'header_image' => $this->faker->imageUrl(),
            'thumbnail_image' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement(['draft', 'published', 'archived']),
            'category_id' => 1,
            'user_id' => 1,
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->sentence,
            'meta_keyword' => $this->faker->word,
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}