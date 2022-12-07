@extends('layouts.app')

@section('title', 'Create Q&A')

@section('content')
    <div class="w-75 mx-auto">
        <form action="{{ route('Q-A.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="text-center mb-3">
                <h1 class="font-mask">Q&A</h1>
                <p class="secondary">Feel free to post your problems or worries about pets</p>
            </div>
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" id="title" class="form-control mb-3">
            <div class="mb-3">
                <label for="category" class="form-label d-block">Category <span class="text-danger">*</span></label>
                @foreach ($all_question_categories as $category)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="category[]"  id="{{ $category->name }}" value="{{ $category->id }}" class="form-check-input">
                        <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>
                    </div>
                @endforeach
            </div>
            <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
            <textarea name="content" id="content" cols="30" rows="3" class="form-control mb-3"></textarea>
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="" class="form-control">
            <div class="form-text mb-3">
                The acceptable formats are jpeg,jpm,png, and gif only. <br>
                Max file size: 1048kb
            </div>
            <div class="text-center">
                <button type="submit" class="btn w-50 mt-2" style="background-color: #faca7b">Post</button>
            </div>
        </form>
    </div>
@endsection
