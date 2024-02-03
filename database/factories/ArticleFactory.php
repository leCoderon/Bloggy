<?php

namespace Database\Factories;

use App\Models\User;
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
            'title' => fake()->sentence(),
            'sub_title' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'likes' => 10,
            'online' => 1,
            'user_id' => User::all()->random()->id,

        ];
    }
}
