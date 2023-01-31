@extends('layouts.app')

@section('title')
 Journal | All Posts   
@endsection

@section('content')
<table class="table text-center">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
    <tr>
        <th scope="row">{{$post['id']}}</th>
        <td>{{$post['title']}}</td>
        <td>{{$post['posted_by']}}</td>
        <td>{{$post['created_at']}}</td>
        <td>
            {{-- <a href="/posts/2">View</a> --}}
            <a href="{{route('posts.show', $post['id'])}}">View</a>
            <a href="{{route('posts.edit', $post['id'])}}">Edit</a>
            <a href="#">Delete</a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>

<nav aria-label="Page navigation">
  <ul class="pagination">
    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>

<div class="position-absolute bottom-0 end-0 pb-3 px-3">
    <a href="{{route('posts.create')}}">
      <x-button label="New Post" />
    </a>
</div>
@endsection