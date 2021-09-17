@extends('layouts.app')

@section('content')
<div class="container cars-container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf

        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" name="author" id="author" value="{{ $post->author }}">
        </div>

        <div class="form-group">
            <label for="cover">Cover</label>
            <input type="text" class="form-control" name="cover" id="cover" value="{{ $post->cover }}">
        </div>

        <div class="form-group">
            <label for="data">Data :</label>
            <input type="date" class="form-control" name="data" id="data" value="{{ $post->data }}">
        </div>
            
        <div class="form-group">
            <!--<input type="submit" value="Salva">-->
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
            
    </form>

</div>
@endsection