@extends('layouts.app')

@section('title', 'All Comments')

@section('content')
    <div class="text-center mb-3">
        <h1 class="font-mask">All Comments</h1>
    </div>
    <section class="mx-auto my-5 w-75">
        <div class="card">
            <div class="card-header" style="background-color: #faca7b">
                <div class="row">
                    <div class="col-2">
                        @if ($answer->user->image)
                            <i class="fa-solid fa-user"></i>
                        @else
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" class="rounded-circle me-3" height="50px"
                            width="50px" alt="avatar" />
                        @endif
                    </div>
                    <div class="col-10">
                        <div>
                            <h5 class="card-title font-weight-bold mb-2">{{ $answer->user->name }}</h5>
                            <p class="card-text"><i class="far fa-clock pe-2"></i>{{ $answer->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" style="background-color: #f8f8f8">
                <h4 class="card-title text-decoration-underline px-3 py-3 mb-0" style="background-color: #f8f8f8">A. {{ $answer->body }}</h4>
            </div>
            @if ($answer->image)
                <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
                    <img src="{{ asset('/storage/images/answers/' . $answer->image) }}" class="img-fluid" alt="{{ $answer->image }}">
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
            @else
                <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
                    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Food/full page/2.jpg"
                    alt="Card image cap" />
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
            @endif
            <div class="card-body pt-2" style="background-color: #f8f8f8">
                <div class="text-end">
                    <i class="fas fa-share-alt text-muted p-md-1 my-1 me-2" data-mdb-toggle="tooltip"
                        data-mdb-placement="top" title="Share this post"></i>
                    <i class="fas fa-heart text-muted p-md-1 my-1 me-0" data-mdb-toggle="tooltip" data-mdb-placement="top"
                        title="I like it"></i>
                </div>
                <form action="{{ route('Answer_Comment.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="answer_id" value="{{ $answer->id }}">
                    <label for="comment" class="form-label">Comment</label>
                    <div class="row">
                        <div class="col-8">
                            <input type="text" name="comment" id="comment" class="form-control mb-3" placeholder="Add comment here!">
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn" style="background-color: #faca7b">Add Comment</button>
                        </div>
                    </div>
                </form>
                <div class="list-group">
                    @foreach ($all_comments as $comment)
                        <div class="list-group-item border-0 p-0 mb-2" style="background-color: #f8f8f8">
                            <a href="#" class="text-decoration-none text-dark fw-bold">{{ $comment->user->name }}</a>
                            &nbsp;
                            <p class="d-inline fw-light">{{ $comment->body }}</p>
                            <form action="{{ route('Answer_Comment.destroy', $comment->id ) }}" method="post">
                                @method('DELETE')
                                @csrf

                                <p class="text-muted small d-inline me-1">{{ $comment->created_at->diffForHumans() }}</p>
                                @if ($comment->user->id === Auth::user()->id)
                                    <button type="submit" class="border-0 bg-transparent small text-danger p-0"> Delete</button>
                                @endif
                            </form>
                        </div>
                    @endforeach
                    <div class="mx-auto mt-3">
                        {{ $all_comments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
