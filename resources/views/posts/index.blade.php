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
                <td>
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="{{ route('posts.show', $post) }}">
                            <button class="btn btn-primary">
                                <i class="bi bi-zoom-in"></i>
                            </button>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection