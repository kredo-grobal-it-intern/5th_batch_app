@extends('layouts.app')

@section('title', 'Create Q&A')

@section('content')
    <div class="row">
        <div class="col-3 border-end p-0">
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white" style="position: sticky; top: 150px; z-index: 999;">
                <div class="position-sticky">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('post.index') }}" class="list-group-item list-group-item-action py-3 ripple" aria-current="true">
                            <i class="fa-solid fa-house-chimney me-3 fa-fw"></i><span>Home</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-3 ripple">
                            <i class="fa-solid fa-magnifying-glass me-3 fa-fw"></i><span>Search</span>
                        </a>
                        <a href="{{ route('post.create') }}" class="list-group-item list-group-item-action py-3 ripple">
                            <i class="fa-solid fa-square-plus me-3 fa-fw"></i><span>Create</span>
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
                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="text-center mb-3 p-4">
                        <h1 class="font-mask">Create Post</h1>
                        <p class="secondary">Feel free to share your partner</p>
                    </div>
                    <label for="body" class="form-label">Body <span class="text-danger">*</span></label>
                    <textarea name="body" id="body" cols="30" rows="3" class="form-control mb-3"></textarea>
                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="image" name="image[]" class="form-control" multiple="multiple">
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
