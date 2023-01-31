@extends('layouts.app')

@section('title')
    Post Details
@endsection

@section('content')
<div class="card text-center">
  <div class="card-header">
    {{'@'.$post['posted_by']}}
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$post['title']}}</h5>
    <p class="card-text">{{$post['content']}}</p>
  </div>
  <div class="card-footer text-muted">
    {{$post['created_at']}}
  </div>
</div>
@endsection