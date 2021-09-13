@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

    @foreach($allPosts as $post)
        <div class="card text-center">
            <h2>{{$post->title}}</h2>
            <div>{{$post->data}} </div>
            <img src="{{ $post->cover }}" 
            alt="immagine del post {{$post->title}}"/>
            <p>Author: {{$post->author}}</p>
        </div>
    @endforeach
@endsection
