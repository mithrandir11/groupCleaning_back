<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = fake()->sentence(4);
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'is_visible' => true,
            'title' => $title,
            'slug' => Str::slug($title).random_int(1,1000),
            'text' => fake()->sentence(600),
        ];
    }
}
