@extends('layouts.app')

@section('title', 'All Answers')

@section('content')
    <div class="text-center mb-3">
        <h1 class="font-mask">All Answers</h1>
    </div>
    @foreach ($all_answers as $answer)
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
                        <div class="col-6">
                            <div>
                                <h5 class="card-title font-weight-bold mb-2">{{ $answer->user->name }}</h5>
                                <p class="card-text"><i class="far fa-clock pe-2"></i>{{ $answer->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="col-4">
                            @if($answer->user->id === Auth::user()->id)
                                <div class="float-end">
                                    <button type="button" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#deleteAnswer-{{ $answer->id }}">Delete</button>
                                </div>

                                <!-- Modal for Delete-->
                                <div class="modal fade" id="deleteAnswer-{{ $answer->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="false">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header text-danger">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    <i class="fa-solid fa-circle-exclamation"></i> Delete question
                                                </h5>
                                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure to delete this answer?</p>
                                                <h5>Your Answer: {{ $answer->body }}</h5>
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
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('Answer.destroy', $answer->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-outline-danger btn-sm" data-mdb-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
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
                    <div class="float-end d-inline d-flex">
                        <i class="fas fa-share-alt text-muted p-md-1 my-1 me-2" data-mdb-toggle="tooltip"
                            data-mdb-placement="top" title="Share this post"></i>
                        @if ($answer->answerIsLiked())
                            <form action="{{ route('Answer_Reaction.destroy', $answer->id ) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-light text-danger p-md-1 my-1 me-0"><i class="fas fa-heart unlike fs-6" data-mdb-toggle="tooltip" data-mdb-placement="top"
                                title="Remove like"></i></button>
                            </form>
                        @else
                            <form action="{{ route('Answer_Reaction.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $answer->id }}">
                                <button type="submit" class="btn btn-light text-muted p-md-1 my-1 me-0"><i class="fas fa-heart like fs-6" data-mdb-toggle="tooltip" data-mdb-placement="top"
                                title="I like it"></i></button>
                            </form>
                        @endif
                    </div><br>
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
                    @if ($answer->comments->isNotEmpty())
                        <hr>
                        <div class="list-group">
                            @foreach ($answer->comments->take(3) as $comment)
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
                                @if ($answer->comments->count() > 3 AND $loop->last)
                                    <li class="list-group-item border-0 p-0 text-dark mb-2" style="background-color: #f8f8f8">
                                        <a href="{{ route('Answer_Comment.show', $answer->id ) }}" class="text-decoration-underline small">View all comments ({{ $answer->comments->count() }})</a>
                                    </li>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endforeach
@endsection
