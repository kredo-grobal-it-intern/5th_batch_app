@extends('layouts.app')

@section('title', 'All Comments')

@section('content')
    <div class="row">
        <div class="col-3 border-end p-0">
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white" style="position: sticky; top: 150px; z-index: 999;">
                <div class="position-sticky">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action py-3 ripple" aria-current="true">
                            <i class="fa-solid fa-angles-left me-3 fa-fw"></i><span>Back</span>
                        </a>
                        <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action py-3 ripple" aria-current="true">
                            <i class="fa-solid fa-house-chimney me-3 fa-fw"></i><span>Home</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-3 ripple">
                            <i class="fa-solid fa-magnifying-glass me-3 fa-fw"></i><span>Search</span>
                        </a>
                        <a href="{{ route('posts.create') }}" class="list-group-item list-group-item-action py-3 ripple">
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
            <div class="text-center p-4">
                <h1 class="font-mask">All Comments</h1>
            </div>
            <section class="mx-auto w-75">
                <div class="card" style="background-color: #f8f8f8">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-2">
                                @if ($post->user->image)
                                    <i class="fa-solid fa-user"></i>
                                @else
                                    <img src="{{ asset('/storage/images/resources/animal_lover.png') }}" class="" height="50px"
                                    width="50px" alt="animal_lover">
                                @endif
                            </div>
                            <div class="col-10">
                                <div>
                                    <h5 class="card-title font-weight-bold mb-2">{{ $post->user->name }} <span class="fs-6 text-muted ms-3 fw-light"> <i class="far fa-clock pe-2"></i>{{ $post->created_at->diffForHumans() }}</span></h5>
                                    <p>{{ $post->body }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #f8f8f8">
                        <div class="list-group">
                            @foreach ($all_comments as $comment)
                                <div class="list-group-item border-0 p-0 mb-3" style="background-color: #f8f8f8">
                                    <div class="row">
                                        <div class="col-2">
                                            @if ($post->user->image)
                                                <i class="fa-solid fa-user"></i>
                                            @else
                                                <img src="{{ asset('/storage/images/resources/animal_lover.png') }}" class="" height="50px"
                                                width="50px" alt="animal_lover">
                                            @endif
                                        </div>
                                        <div class="col-10">
                                            <div>
                                                <a href="#" class="text-decoration-none text-dark fw-bold">{{ $comment->user->name }} <span class="fs-6 text-muted ms-3 fw-light"> <i class="far fa-clock pe-2"></i>{{ $comment->created_at->diffForHumans() }}</span></a><br>
                                                <div class="d-flex">
                                                    <p class="d-inline fw-light me-2">{{ $comment->body }}</p>
                                                    <form action="{{ route('posts.comments.destroy', ['post' => $post->id, 'comment' => $comment->id] ) }}" method="post">
                                                        @method('DELETE')
                                                        @csrf

                                                        @if ($comment->user->id === Auth::id())
                                                            <button type="submit" class="border-0 bg-transparent small text-danger p-0"> Delete</button>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="mx-auto mt-3">
                                {{ $all_comments->links() }}
                            </div>
                        </div><hr>
                        <form action="{{ route('posts.comments.store', $post->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="row">
                                <div class="col-1">
                                    @if (Auth::user()->image)
                                        <i class="fa-solid fa-user"></i>
                                    @else
                                        <img src="{{ asset('/storage/images/resources/animal_lover.png') }}" class="" height="40px"
                                        width="40px" alt="animal_lover">
                                    @endif
                                </div>
                                <div class="col-8">
                                    <input type="text" name="comment" id="comment" class="form-control mb-3" placeholder="Add a comment as {{ Auth::user()->name }}">
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn" style="background-color: #faca7b">Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
