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

<form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
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
  
  {{-- @dd($post->image_path) --}}
  <div class="form-group mb-3">
    @if ($post->image_path)
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="delete_image" id="delete-image-check">
      <label class="form-check-label" for="delete-image-check">
        Delete image
      </label>
    </div>
    <img src="{{asset($post->image_path)}}" class="img-thumbnail d-block mb-2" width="100" height="100" alt="post image" />

    <label for="post-image" class="form-label">Replace Image</label>
    @else
    <label for="post-image" class="form-label">Image</label>
    @endif
      
    <input class="form-control form-control-sm" name="image" id="post-image" type="file" />
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