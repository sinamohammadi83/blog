<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'user_id' => 2,
            'category_id' => 1,
            'slug' => $this->faker->unique()->slug(),
            'image' => $this->faker->imageUrl,
            'content' => $this->faker->text,
            'is_published' => 1,
            'comment' => 1 ,
            'countLike' => 0
        ];
    }
}
