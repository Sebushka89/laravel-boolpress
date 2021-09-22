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

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" class="form-control" name="author" id="author">
        </div>

        <div class="form-group">
            <label for="cover">Cover</label>
            <input type="text" class="form-control" name="cover" id="cover">
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="category_id">Options</label>
                </div>
                <select class="custom-select" id="category_id" name="category_id">
                    <option selected>Choose...</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="data">Data :</label>
            <input type="date" class="form-control" name="data" id="data">
        </div>
            
        <div class="form-group">
            <!--<input type="submit" value="Salva">-->
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
            
    </form>

</div>
@endsection