@extends('layouts.app')

@section('content')

<div class="container posts-container">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Data</th>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        <th scope="col">Picture</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->data}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->author}}</td>
            <td><img src="{{$post->cover}}" alt="picture of {{$post->author}}" /></td>
            <!-- a href="/posts/{{$post->id}}" -->
            <!--<td><a href="{{ route('posts.show', $post) }}"><i class="bi bi-zoom-in"></i></a></td>-->
        </tr>
    </tbody>
    </table>
</div>
@endsection