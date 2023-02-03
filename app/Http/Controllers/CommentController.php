<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request) {
        $request -> validate([
            'text' => ['required'],
            'postId' => ['required', 'exists:posts,id'],
        ]);

        $text = $request->text;
        $postId = $request->postId;
        $userId = Auth::user()->id;

        Comment::create([
            'text' => $text,
            'post_id' => $postId,
            'user_id' => $userId,
        ]);

        return redirect()->route('posts.show', $postId);
    }

    public function destroy($commentId) {
        $selectedComment = Comment::find($commentId);
        
        if(!$selectedComment) {
            return to_route(route: 'posts.index');
        }
        
        $postId = $selectedComment->post_id;
        $selectedComment->forceDelete();

        return redirect()->route('posts.show', $postId);
    }
}