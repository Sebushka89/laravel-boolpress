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
            <td>
                <a href="{{ route('posts.index') }}">
                    <button class="btn btn-primary">
                        <i class="bi bi-zoom-out"></i>
                    </button>
                </a>
            </td>
        </tr>
    </tbody>
    </table>
</div>
@endsection