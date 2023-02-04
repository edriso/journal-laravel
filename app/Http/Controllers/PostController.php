<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest()->paginate(7);
        
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
        
        $image_path = null;
        if($request->hasFile('image')) {
            // $image_path = Storage::putFile('images', $request->file('image'));
            $postImage = $request->file('image');
            $image_path = $postImage->store('images');
        }

        Post::create([
            'title' => $title,
            'content' => $content,
            'user_id' => $userId,
            'image_path' => $image_path,
        ]);

        return to_route(route: 'posts.index');
    }

    public function show($postId) {
        // $selectedPost = Post::where('id', $postId)->first();
        $selectedPost = Post::find($postId);

        if(!$selectedPost) {
            return redirect()->route('posts.index');
        }

        $comments = Comment::where('post_id', $postId)->get();

        return view('posts.show', [
            'post' => $selectedPost,
            'comments' => $comments
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

        if($request->hasFile('image')) {
            Storage::delete($selectedPost->image_path);
            $postImage = $request->file('image');
            $image_path = $postImage->store('images');
            $selectedPost->image_path = $image_path;
        }elseif(isset($request->delete_image)) {
            Storage::delete($selectedPost->image_path);
            $image_path = '';
            $selectedPost->image_path = $image_path;
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
        
        $postComments = Comment::where('post_id', $postId)->get();
        $postComments->each->delete();

        Storage::delete($selectedPost->image_path);
        $selectedPost->delete();

        return redirect()->route('posts.index');
    }
}