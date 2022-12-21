@extends('layouts.app')

@section('title', 'Create post')

@section('content')
    <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="post">
        @csrf

        <div class="mb-4">
            <label for="body" class="form-label fw-bold">Description</label>
            <textarea name="body" id="body" class="form-control" rows="3" placeholder="Whats on your mind"></textarea>
        </div>
        <div class="mb-4">
            <label for="image" class="form-label fw-bold">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <div class="form-text">
                Acceptable formats: jpeg, jpg, png, gif only <br>
                Max file size is 1048kb
            </div>
        </div>
        <button type="submit" class="btn btn-primary px-5">Post</button>
    </form>
@endsection
