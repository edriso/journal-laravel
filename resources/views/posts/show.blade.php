@extends('layouts.app')

@section('title')
    {{$post->title}}
@endsection

@section('content')
<div class="card text-center">
  <div class="card-header">
    <small class="text-muted">On: </small>
    <span class="text-success">
      {{-- {{$post->created_at->format('jS F y \a\t H:i')}} --}}
      {{$post->created_at->isoFormat('ddd, D MMMM Y')}}
    </span>
  </div>
  <div class="card-body">
    <h5 class="card-title h3">{{$post->title}}</h5>
    <p class="card-text" style="white-space: pre-wrap;">{{$post->content}}</p>
  </div>
  <div class="card-footer">
    <small class="text-muted">by: </small>
    <span class="text-success">{{$post->user?->name}}</span>
  </div>
</div>
@endsection