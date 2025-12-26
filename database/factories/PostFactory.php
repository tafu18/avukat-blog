<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        $title = fake()->unique()->sentence;
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => fake()->paragraphs(5, true),
            'image' => null, // Or leave empty
            'is_published' => fake()->boolean(90),
            'published_at' => fake()->dateTimeBetween('-6 months', 'now'),
            'created_at' => fake()->dateTimeBetween('-1 year', '-6 months'),
            'updated_at' => now(),
        ];
    }
}
