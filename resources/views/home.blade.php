@extends('layouts.app')

@section('content')
<div class="container">
    <!-- lista dei libri --> 

    <div class="row">

        @foreach($posts as $post)
            <div class="card col-md-3" style="width: 18rem;">
                <img class="card-img-top" src="{{ $post->cover }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->author }}</p>    
                </div>
                @if(Auth::check())
                    <a href="{{ route('posts.show', $post) }}" class="btn yellow btn-warning">Modify</a>
                @endif 
            </div>
        @endforeach

        
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{ $posts->links() }}
    </div>
</div>
@endsection