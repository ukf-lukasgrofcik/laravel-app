<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
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
            'name' => fake()->name(),
            'published' => fake()->numberBetween(0, 1),
            'content' => fake()->text(255),
        ];
    }

    public function randomCategory() : Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'category_id' => Category::inRandomOrder()->first()->id,
            ];
        });
    }

    public function randomTags() : Factory
    {
        return $this->afterCreating(function (Article $article) {
            $tags = Tag::inRandomOrder()->take(4)->pluck('id')->toArray();

            $article->tags()->attach($tags);
        });
    }

}
