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
  <div class="card-body">
    <h5 class="card-title h3">{{$post->title}}</h5>
    <p class="card-text" style="white-space: pre-wrap;">{{$post->content}}</p>
  </div>
  <div class="card-footer">
    <small class="text-muted">by:</small>
    <span class="text-danger">{{$post->user?->name}}</span>
  </div>
</section>

<section class="card mt-5">
  <div class="card-body p-4">
    <form class="form-outline mb-4 d-flex gap-2">
      <input type="text" id="commentInput" class="form-control" placeholder="Write a comment..." />
      <input type="submit" value="Add" class="btn btn-success btn-sm" />
    </form>
      
    @foreach ($comments as $comment)
    <div class="card bg-light mt-2">
      <div class="card-body">
        <p>{{$comment->text}}</p>

        <div class="d-flex justify-content-between small text-muted">
          <span class="text-success">- {{$comment->user->name}}</span>

          <span>{{$comment->created_at->format('jS F y \a\t H:i')}}</span>
        </div>

        <div class="d-flex justify-content-end gap-2 mt-2">
          <form>
            <input type="submit" value="Edit" class="btn btn-sm" />
          </form>
           <form>
            <input type="submit" value="Delete" class="btn text-danger btn-sm" />
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>
@endsection