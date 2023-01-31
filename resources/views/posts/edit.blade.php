@extends('layouts.app')

@section('title')
    Edit Post
@endsection

@section('content')

<form action="/posts/{{$post['id']}}" method="POST">
@csrf
@method('PUT')
  <div class="form-group mb-3">
    <label for="post-title">Title</label>
    <input type="text" value="{{$post['title']}}" class="form-control" id="post-title" placeholder="Post Title">
  </div>
  <div class="form-group mb-3">
    <label for="post-content">Content</label>
    <textarea class="form-control" id="post-content" rows="3">{{$post['content']}}</textarea>
  </div>
  <div class="form-group mb-4">
    <label for="post-author">Author</label>
    <select class="form-control" id="post-author">
      <option>John Doe</option>
      <option>Jane Doe</option>
    </select>
  </div>
  
  <x-button type="submit" >Edit</x-button>
</form>
@endsection