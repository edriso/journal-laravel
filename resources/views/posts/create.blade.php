@extends('layouts.app')

@section('title')
    Create New Post
@endsection

@section('content')
<form action="/posts" method="POST">
  @csrf
  <div class="form-group mb-3">
    <label for="post-title">Title</label>
    <input type="text" name="title" class="form-control" id="post-title" placeholder="Post Title...">
  </div>
  <div class="form-group mb-3">
    <label for="post-content">Content</label>
    <textarea class="form-control" name="content" id="post-content" rows="3" placeholder="Post Content..."></textarea>
  </div>
  <div class="form-group mb-4">
    <label for="post-author">Author</label>
    <select name="author_id" class="form-control" id="post-author">
      @foreach ($users as $user)
      <option value="{{$user->id}}">
        {{$user->name}}
      </option>
      @endforeach
    </select>
  </div>
  
  <x-button type="submit">Post</x-button>
</form>
@endsection