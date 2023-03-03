@extends('layouts.app')

@section('title', 'Create Q&A')

@section('content')
    <div class="row">
        <div class="col-3 border-end p-0">
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white" style="position: sticky; top: 150px; z-index: 999;">
                <div class="position-sticky">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('questions.index') }}" class="list-group-item list-group-item-action py-3 ripple" aria-current="true">
                            <i class="fa-solid fa-house-chimney me-3 fa-fw"></i><span>Home</span>
                        </a>
                        <a href="{{ route('questions.create') }}" class="list-group-item list-group-item-action py-3 ripple">
                            <i class="fa-solid fa-square-plus me-3 fa-fw"></i><span>Create a question</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-3 ripple">
                            <i class="fa-regular fa-comment me-3 fa-fw"></i><span>Message</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-3 ripple">
                            <i class="fa-solid fa-user me-3 fa-fw"></i><span>Profile</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-9 p-0">
            <div class="w-75 mx-auto">
                <form action="{{ route('questions.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="text-center p-4">
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
        </div>
    </div>
@endsection
