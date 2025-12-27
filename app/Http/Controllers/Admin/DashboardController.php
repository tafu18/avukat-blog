<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'posts' => Post::count(),
            'comments' => Comment::count(),
            'pending_comments' => Comment::where('is_approved', false)->count(),
            'views' => Post::sum('views'),
        ];

        // Top 5 Most Read Posts
        $topPosts = Post::orderBy('views', 'desc')->take(5)->get();

        // Recent Pending Comments
        $pendingComments = Comment::where('is_approved', false)
            ->with('post')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'topPosts', 'pendingComments'));
    }
}
