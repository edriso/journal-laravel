@extends('layouts.app')

@section('title')
    Post Details
@endsection

@section('content')
<div class="card text-center">
  <div class="card-header">
    {{$post->created_at}}
  </div>
  <div class="card-body">
    <h5 class="card-title h3">{{$post->title}}</h5>
    <p class="card-text" style="white-space: pre-wrap;">{{$post->content}}</p>
  </div>
  <div class="card-footer text-muted">
    - {{$post->user?->name}}
  </div>
</div>
@endsection