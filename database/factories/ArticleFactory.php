<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->unique()->slug(),
            'content' => $this->faker->paragraphs(4, true),
            'category_id' => \App\Models\Category::factory(),
            'featured_image' => $this->faker->imageUrl(),
            'is_published' => $this->faker->boolean(80),
            'published_at' => $this->faker->dateTimeThisYear(),
        ];
    }
}
