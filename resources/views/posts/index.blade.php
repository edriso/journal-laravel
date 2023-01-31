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
    <tr class="align-middle">
        <th scope="row">{{$post['id']}}</th>
        <td>{{$post['title']}}</td>
        <td>{{$post['posted_by']}}</td>
        <td>{{$post['created_at']}}</td>
        <td>
          <x-button class="btn-sm p-0" color="light" >
              {{-- <a href="/posts/2">View</a> --}}
              <a href="{{route('posts.show', $post['id'])}}" class="px-3 py-1 d-inline-block text-decoration-none">View</a>
            </x-button>
            <x-button class="btn-sm p-0" color="light" >
              <a href="{{route('posts.edit', $post['id'])}}" class="px-3 py-1 d-inline-block text-decoration-none">Edit</a>
            </x-button>
            <x-button class="btn-sm p-0" color="light" >
              {{-- <a href="#" class="text-danger px-3 py-1 d-inline-block text-decoration-none">Delete</a> --}}
              <span class="text-danger px-3 py-1 d-inline-block" data-bs-toggle="modal" data-bs-target="#delete-post-modal" data-bs-post-id="{{$post['id']}}">Delete</span>
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


<div class="modal fade" id="delete-post-modal" tabindex="-1" aria-labelledby="delete-post-modal-title" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="delete-post-modal-title">Delete post</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this post?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <form method="POST">
          @csrf
          @method('DELETE')
          <x-button type="submit" color="danger">Delete</x-button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  // Dynamically change delete form action
  const deleteModal = document.getElementById('delete-post-modal')
  deleteModal.addEventListener('show.bs.modal', event => {
  
  // Button that triggered the modal
  const button = event.relatedTarget
  // Extract info from data-bs-* attributes
  const postId = button.getAttribute('data-bs-post-id')

  // Update Form Action
  const modalForm = deleteModal.querySelector('form')
  modalForm.setAttribute('action', `/posts/${postId}`);
})
</script>
@endsection