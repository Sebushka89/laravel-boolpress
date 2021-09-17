@extends('layouts.app')

@section('content')

<div class="container posts-container">
    <a href="{{ route('posts.create') }}"><button class="btn btn-primary">Add Post</button></a>
    <br>
    <table class="table text-center ">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Data</th>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        <th scope="col">Picture</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($allPosts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->created_at}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->author}}</td>
                <td><img src="{{$post->cover}}" alt="picture of {{$post->author}}" /></td>
                <!-- a href="/posts/{{$post->id}}" -->
                <td class="d-flex">
                    <a href="{{ route('posts.show', $post) }}">
                        <button class="btn btn-primary">
                            <i class="bi bi-zoom-in"></i>
                        </button>
                    </a>
                    <a href="{{ route('posts.edit', $post) }}">
                        <button class="btn btn-warning">
                            <i class="bi bi-arrow-repeat"></i>
                        </button>
                    </a>
                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="bi bi-trash"></i></button>
                    
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header bg-danger">
                            <h5 class="modal-title" id="exampleModalLabel">ATTENZIONE</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Sei veramente sicuro di voler eliminare l'elemento?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Torna indietro</button>
                            <form action="{{route('posts.destroy', $post)}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" data-target="#exampleModal" class="btn btn-danger">Elimina</button>
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection