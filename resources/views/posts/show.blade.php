@extends('layouts.app')

@section('content')

<div class="container posts-container">
    <table class="table text-center">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Data</th>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        <th scope="col">Picture</th>
        <th scope="col">Category</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->created_at}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->author}}</td>
            <td><img src="{{$post->cover}}" alt="picture of {{$post->author}}" /></td>
            <!-- a href="/posts/{{$post->id}}" -->
            <td>{{ $post->category->name }}</td>
            <td>
                <a href="{{ route('posts.index') }}">
                    <button class="btn btn-primary">
                        <i class="bi bi-zoom-out"></i>
                    </button>
                </a>
                <a href="{{ route('posts.edit', $post) }}">
                    <button class="btn btn-success">
                        <i class="bi bi-arrow-repeat"></i>
                    </button>
                </a>
                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$post->id}}"><i class="bi bi-trash"></i></button>
                
                <div class="modal fade" id="exampleModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <button type="submit" data-target="#exampleModal{{$post->id}}" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
    </table>
</div>
@endsection