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
          <x-button class="btn-sm p-0" color="light" >
              {{-- <a href="/posts/2">View</a> --}}
              <a href="{{route('posts.show', $post['id'])}}" class="p-2 d-inline-block text-decoration-none">View</a>
            </x-button>
            <x-button class="btn-sm p-0" color="light" >
              <a href="{{route('posts.edit', $post['id'])}}" class="p-2 d-inline-block text-decoration-none">Edit</a>
            </x-button>
            <x-button class="btn-sm p-0" color="light" >
              <a href="#" class="text-danger p-2 d-inline-block text-decoration-none">Delete</a>
            </x-button>
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
      <x-button>New Post</x-button>
    </a>
</div>

{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> --}}
@endsection