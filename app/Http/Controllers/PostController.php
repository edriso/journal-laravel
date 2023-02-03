<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index() {
        // $posts = Post::all();
        // $posts = Post::paginate(5);
        $posts = Post::orderBy('id', 'desc')->paginate(7);
        
        return view('posts.index', [
            'posts' => $posts,
            'isAuth' => Auth::check()
        ]);
    }

    public function create() {
        $users = User::all();

        return view('posts.create', [
            'users' => $users,
            'authId' => Auth::user()->id
        ]);
    }

    public function store(PostRequest $request) {
        $request -> validate([
            'title' => ['unique:posts'],
        ], [
            'title.unique' => 'Title already exists!',
        ]);

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

    public function update($postId, PostRequest $request) {
        $selectedPost = Post::find($postId);
        
        $request -> validate([
            'title' => [Rule::unique('posts')->ignore($selectedPost->id)]
        ]);

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