<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comment;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 15 posts
        Post::factory(15)->create()->each(function ($post) {
            // Create 0 to 5 comments for each post
            Comment::factory(rand(0, 5))->create([
                'post_id' => $post->id
            ]);
        });
    }
}
