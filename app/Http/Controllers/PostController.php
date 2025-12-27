<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = \App\Models\Post::where('is_published', true)->orderBy('published_at', 'desc')->paginate(6);
        $mostRead = \App\Models\Post::where('is_published', true)->orderBy('views', 'desc')->take(5)->get();
        // For slider: Top 10 most read (simulating "Today's Top" with all time popular for now)
        $sliderPosts = \App\Models\Post::where('is_published', true)->orderBy('views', 'desc')->take(10)->get();
        
        return view('welcome', compact('posts', 'mostRead', 'sliderPosts'));
    }

    public function blog()
    {
        $posts = \App\Models\Post::where('is_published', true)->orderBy('published_at', 'desc')->paginate(12);
        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = \App\Models\Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
        
        // Increment views (basic session check to prevent simple refresh spam)
        $viewKey = 'post_viewed_' . $post->id;
        if (!session()->has($viewKey)) {
            $post->increment('views');
            session()->put($viewKey, true);
        }

        $recommended = \App\Models\Post::where('is_published', true)
                                        ->where('id', '!=', $post->id)
                                        ->inRandomOrder()
                                        ->take(3)
                                        ->get();

        return view('posts.show', compact('post', 'recommended'));
    }
}
