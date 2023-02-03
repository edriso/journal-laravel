@extends('layouts.app')

@section('title')
    Edit Post
@endsection

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('posts.update', $post->id)}}" method="POST">
@csrf
@method('PUT')
  <div class="form-group mb-3">
    <label for="post-title">Title</label>
    <input type="text" name="title" value="{{$post->title}}" class="form-control" id="post-title" placeholder="Post Title...">
  </div>
  <div class="form-group mb-3">
    <label for="post-content">Content</label>
    <textarea class="form-control" name="content" id="post-content" rows="3" placeholder="Post Content...">{{$post->content}}</textarea>
  </div>
  <div class="form-group mb-3">
    <label for="post-image" class="form-label">Image</label>
    <input class="form-control form-control-sm" name="image" id="post-image" type="file" accept="image/png, image/gif, image/jpeg" />
  </div>
  <div class="form-group mb-4">
    <label for="post-author">Author</label>
    <select name="author_id" class="form-control" id="post-author">
      @foreach ($users as $user)
      <option value="{{$user->id}}" {{$post->user_id === $user->id ? 'selected' : ''}}>
        {{$user->name}}
      </option>
      @endforeach
    </select>
  </div>
  
  <x-button type="submit" color="success">Update</x-button>
</form>
@endsection