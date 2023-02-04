@extends('layouts.app')

@section('title')
    {{$post->title}}
@endsection

@section('content')
<section class="card text-center">
  <div class="card-header small text-muted">
    On:
    <span>
      {{$post->created_at->isoFormat('ddd, D MMMM Y')}}
    </span>
  </div>
  
  @if ($post->image_path)
  <img
  {{-- src="https://images.unsplash.com/photo-1540337706094-da10342c93d8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80" --}}
  src="{{url($post->image_path)}}"
  {{-- src="{{url('storage/app/'.$post->image_path)}}" --}}
  {{-- src="{{Storage::disk('local')->url('app/'.$post->image_path)}}" --}}
  {{-- src="{{asset('storage/app/'.$post->image_path)}}" --}}
  class="object-fit-cover"
  alt="post image"
  style="height: 30rem;"
  />
  @endif
  
  <div class="card-body">
    <h5 class="card-title h3">{{$post->title}}</h5>
    <p class="card-text" style="white-space: pre-wrap;">{{$post->content}}</p>
  </div>
  <div class="card-footer">
    <small class="text-muted">by:</small>
    <span class="text-danger">{{$post->user?->name}}</span>
  </div>
</section>

{{-- Comments --}}
<section class="card mt-5">
  <div class="card-body p-4">
    <form action="{{route('comments.store')}}" method="POST" class="form-outline mb-4 d-flex gap-2">
      @csrf
      <input type="text" name="text" class="form-control" placeholder="Write a comment..." />
      <input type="hidden" name="postId" value="{{$post->id}}" />
      <input type="submit" value="Add" class="btn btn-success btn-sm" />
    </form>

    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <p class="mb-0 text-danger">
            {{ $error }}
        </p>
      @endforeach
    @endif
      
    @foreach ($comments as $comment)
    <div class="card bg-light mt-2">
      <div class="card-body">
        <p>{{$comment->text}}</p>

        <div class="d-flex justify-content-between small text-muted">
          <span class="text-success">- {{$comment->user->name}}</span>

          <span>{{$comment->created_at->diffForHumans()}}</span>
        </div>

        <div class="d-flex justify-content-end gap-2 mt-2">
          {{-- <form>
            <input type="submit" value="Edit" class="btn btn-sm" />
          </form> --}}
           <form method="POST" action="{{route('comments.destroy', $comment->id)}}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" class="btn text-danger btn-sm" />
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>
@endsection