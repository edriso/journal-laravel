@extends('layouts.app')

@section('title')
    Create New Post
@endsection

@section('content')
<form action="/posts" method="POST">
  @csrf
  <div class="form-group mb-3">
    <label for="post-title">Title</label>
    <input type="text" class="form-control" id="post-title" placeholder="Post Title">
  </div>
  <div class="form-group mb-3">
    <label for="post-content">Content</label>
    <textarea class="form-control" id="post-content" rows="3"></textarea>
  </div>
  <div class="form-group mb-4">
    <label for="post-author">Author</label>
    <select class="form-control" id="post-author">
      <option>John Doe</option>
      <option>Jane Doe</option>
    </select>
  </div>
  
  <x-button label="Post" />
</form>
@endsection