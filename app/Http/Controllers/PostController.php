<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index() {
        $allPosts = Post::all();

        return view('posts.index', [
            'posts' => $allPosts
        ]);
    }

    public function create() {
        $users = User::all();

        return view('posts.create', [
            'users' => $users
        ]);
    }

    public function store(Request $request) {
        // $title = request()->title;
        $formData = $request->all();
        $title = $formData['title'];
        $content = $formData['content'];
        $userId = $formData['author_id'];

        Post::create([
            'title' => $title,
            'content' => $content,
            'user_id' => $userId,
        ]);

        return to_route(route: 'posts.index');
    }

    public function show($postId) {
        // $selectedPost = Post::where('id', $postId)->first();
        $selectedPost = Post::find($postId);

        if(!$selectedPost) {
            return redirect()->route('posts.index');
        }

        return view('posts.show', [
            'post' => $selectedPost
        ]);
    }

    public function edit($postId) {
        $selectedPost = Post::find($postId);

        if(!$selectedPost) {
            return to_route(route: 'posts.index');
        }

        $users = User::all();

        return view('posts.edit', [
            'post' => $selectedPost,
            'users' => $users
        ]);
    }

    public function update($postId, Request $request) {
         $selectedPost = Post::find($postId);

        if(!$selectedPost) {
            return to_route(route: 'posts.index');
        }

        $selectedPost->title = $request->title;
        $selectedPost->content = $request->content;
        $selectedPost->user_id = $request->author_id;

        $selectedPost->save();

        return to_route(route: 'posts.index');
    }

    public function destroy($postId) {
        $selectedPost = Post::find($postId);

        if(!$selectedPost) {
            return to_route(route: 'posts.index');
        }

        $selectedPost->forceDelete();

        return redirect()->route('posts.index');
    }
}