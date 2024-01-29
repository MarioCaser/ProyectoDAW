<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        // $comments = Comment::orderBy('created_at', 'desc')->get();
        $comments = Comment::orderBy('created_at', 'desc')->paginate(10);

        return view('welcome', compact('comments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
            'rating' => 'required|integer|between:1,5',
        ]);

        $comment = new Comment();
        $comment->content = $request->body;
        $comment->rating = $request->rating;
        $comment->user_id = auth()->user()->id;
        $comment->save();

        
        return redirect()->route('comments.index')->with('success', 'Comment added successfully.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }
}
