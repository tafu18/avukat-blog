<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
        ]);

        $comment = $post->comments()->create([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'is_approved' => false
        ]);

        try {
            \Illuminate\Support\Facades\Mail::to('tayfuntasdemir3@gmail.com')->send(new \App\Mail\NewCommentNotification($comment, $post));
        } catch (\Exception $e) {
            // Log error or ignore
            \Illuminate\Support\Facades\Log::error('Mail sending failed: ' . $e->getMessage());
        }

        return back()->with('success', 'Yorumunuz gönderildi ve onay için yöneticiye iletildi.');
    }
}
