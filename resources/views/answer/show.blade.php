@extends('layouts.app')

@section('title', 'All Answers')

@section('content')
    <div class="row">
        <div class="col-3 border-end p-0">
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white" style="position: sticky; top: 150px; z-index: 999;">
                <div class="position-sticky">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('questions.index') }}" class="list-group-item list-group-item-action py-3 ripple" aria-current="true">
                            <i class="fa-solid fa-angles-left me-3 fa-fw"></i><span>Back</span>
                        </a>
                        <a href="{{ route('questions.index') }}" class="list-group-item list-group-item-action py-3 ripple" aria-current="true">
                            <i class="fa-solid fa-house-chimney me-3 fa-fw"></i><span>Home</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-3 ripple">
                            <i class="fa-solid fa-magnifying-glass me-3 fa-fw"></i><span>Search</span>
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
            <div class="text-center p-4">
                <h1 class="font-mask">All Answers</h1><br>
                <h3 class="text-decoration-underline"><a href="{{ route('questions.index') }}" class="text-dark">Q.{{ $question->title }}</a></h3>
                <p>{{ $question->content }}</p>
            </div>
            {{-- Best Answer --}}
            @if ( $question->IsSelectedBestAnswer() )
                <section class="mx-auto my-3 pb-4 w-75">
                    <h3 class="text-primary">The Best Answer <i class="fa-solid fa-medal"></i></h3>
                    <div class="card" style="background-color: #f8f8f8; position: relative;">
                        <div class="card-header" style="background-color: #faca7b">
                            <div class="row">
                                <div class="col-2">
                                    @if ($best_answer->user->image)
                                        <i class="fa-solid fa-user"></i>
                                    @else
                                        <img src="{{ asset('/storage/images/resources/animal_lover.png') }}" class="" height="50px"
                                        width="50px" alt="animal_lover">
                                    @endif
                                </div>
                                <div class="col-6">
                                    <div>
                                        <h5 class="card-title font-weight-bold mb-2">{{ $best_answer->user->name }}</h5>
                                        <p class="card-text"><i class="far fa-clock pe-2"></i>{{ $best_answer->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    @if($best_answer->user->id === Auth::id())
                                        <div class="float-end">
                                            <button type="button" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#deleteAnswer-{{ $best_answer->id }}">Delete</button>
                                        </div>

                                        <!-- Modal for Delete-->
                                        <div class="modal fade" id="deleteAnswer-{{ $best_answer->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="false">
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
                                                        <h5>Your Answer: {{ $best_answer->body }}</h5>
                                                        @if ($best_answer->image)
                                                            <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
                                                                <img src="{{ asset('/storage/images/answers/' . $best_answer->image) }}" class="img-fluid" alt="{{ $best_answer->image }}">
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
                                                        <form action="{{ route('answers.destroy', $best_answer->id) }}" method="post">
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
                        <div class="container" >
                            <h4 class="card-title text-decoration-underline px-3 py-3 mb-0" >A. {{ $best_answer->body }}</h4>
                        </div>
                        @if ($best_answer->image)
                            <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
                                <img src="{{ asset('/storage/images/answers/' . $best_answer->image) }}" class="img-fluid" alt="{{ $best_answer->image }}">
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                        @endif
                        <div class="card-body pt-2">
                            <div class="float-end d-inline d-flex">
                                <i class="fas fa-share-alt text-muted p-md-1 my-1 me-2" data-mdb-toggle="tooltip"
                                        data-mdb-placement="top" title="Share this post"></i>
                                @if ($best_answer->userReaction())
                                    <button type="button" data-answer-id="{{ $best_answer->id }}" class="btn btn-outline-light text-danger p-md-1 my-1 me-0 remove-reaction" style="border: none; outline: none; background: transparent;">
                                        <i class="fa-solid fa-heart fs-6" data-mdb-toggle="tooltip" data-mdb-placement="top"
                                        title="Remove like"></i>
                                    </button>
                                @else
                                    <button type="button" data-answer-id="{{ $best_answer->id }}" class="btn btn-outline-light text-muted p-md-1 my-1 me-0 react" style="border: none; outline: none; background: transparent;">
                                        <i class="fa-regular fa-heart fs-6" data-mdb-toggle="tooltip" data-mdb-placement="top"
                                        title="I like it"></i>
                                    </button>
                                @endif
                            </div><br>
                            @if ($best_answer->comments->isNotEmpty())
                                <hr>
                                <div class="list-group">
                                    @foreach ($best_answer->comments->take(3) as $comment)
                                        <div class="list-group-item border-0 p-0 mb-2" style="background-color: #f8f8f8">
                                            <a href="#" class="text-decoration-none text-dark fw-bold">{{ $comment->user->name }}</a>
                                            &nbsp;
                                            <p class="d-inline fw-light">{{ $comment->body }}</p>
                                            <form action="{{ route('answer_comment.destroy', $comment->id ) }}" method="post">
                                                @method('DELETE')
                                                @csrf

                                                <p class="text-muted small d-inline me-1">{{ $comment->created_at->diffForHumans() }}</p>
                                                @if ($comment->user->id === Auth::id())
                                                    <button type="submit" class="border-0 bg-transparent small text-danger p-0"> Delete</button>
                                                @endif
                                            </form>
                                        </div>
                                        @if ($best_answer->comments->count() > 3 AND $loop->last)
                                            <li class="list-group-item border-0 p-0 text-dark mb-2" style="background-color: #f8f8f8">
                                                <a href="{{ route('answer_comment.show', $best_answer->id ) }}" class="text-decoration-underline small">View all {{ $best_answer->comments->count() }} comments</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                            <hr>
                            <form action="{{ route('answer_comment.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="answer_id" value="{{ $best_answer->id }}">
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
                        <div class="mx-auto">
                            <img src="{{ asset('/storage/images/resources/best_answer.png') }}" class="" style="" alt="">
                        </div>
                    </div>
                </section>
            @endif
            <hr>
            @foreach ($all_answers as $answer)
                <section class="mx-auto my-4 w-75">
                    <div class="card" style="background-color: #f8f8f8">
                        <div class="card-header" style="background-color: #faca7b">
                            <div class="row">
                                <div class="col-2">
                                    @if ($answer->user->image)
                                        <i class="fa-solid fa-user"></i>
                                    @else
                                        <img src="{{ asset('/storage/images/resources/animal_lover.png') }}" class="" height="50px"
                                        width="50px" alt="animal_lover">
                                    @endif
                                </div>
                                <div class="col-9">
                                    <div>
                                        <h5 class="card-title font-weight-bold mb-2">{{ $answer->user->name }}</h5>
                                        <p class="card-text"><i class="far fa-clock pe-2"></i>{{ $answer->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="col-1">
                                    @if($answer->user->id === Auth::id())
                                        <div class="dropdown">
                                            <i class="fa-solid fa-ellipsis" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false"></i>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><button type="button" class="dropdown-item text-danger" data-mdb-toggle="modal" data-mdb-target="#deleteAnswer-{{ $answer->id }}"><i class="fa-solid fa-trash"></i> Delete</button></li>
                                            </ul>
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
                                                        <form action="{{ route('answers.destroy', $answer->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-outline-danger btn-sm" data-mdb-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($question->user->id === Auth::id() && $answer->user->id !== Auth::id())
                                        @if ( $question->IsSelectedBestAnswer() )

                                        @else
                                            <div class="dropdown">
                                                <i class="fa-solid fa-ellipsis" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false"></i>
                                                <form action="{{ route('SelectBestAnswer', $answer->id )}}" method="post">
                                                    @csrf
                                                    @method('PATCH')

                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li><button type="submit" class="dropdown-item text-primary">Select this answer as a best answer <i class="fa-regular fa-thumbs-up"></i></button></li>
                                                    </ul>
                                                </form>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="container" >
                            <h4 class="card-title text-decoration-underline px-3 py-3 mb-0" >A. {{ $answer->body }}</h4>
                        </div>
                        @if ($answer->image)
                            <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
                                <img src="{{ asset('/storage/images/answers/' . $answer->image) }}" class="img-fluid" alt="{{ $answer->image }}">
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                        @endif
                        <div class="card-body pt-2" >
                            <div class="float-end d-inline d-flex">
                                {{-- <i class="fas fa-share-alt text-muted p-md-1 my-1 me-2" data-mdb-toggle="tooltip"
                                    data-mdb-placement="top" title="Share this post"></i>
                                @if ($answer->answerIsLiked())
                                    <form action="{{ route('answer_reaction.destroy', $answer->id ) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-light text-danger p-md-1 my-1 me-0"><i class="fas fa-heart unlike fs-6" data-mdb-toggle="tooltip" data-mdb-placement="top"
                                        title="Remove like"></i></button>
                                    </form>
                                @else
                                    <form action="{{ route('answer_reaction.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $answer->id }}">
                                        <button type="submit" class="btn btn-light text-muted p-md-1 my-1 me-0"><i class="fas fa-heart like fs-6" data-mdb-toggle="tooltip" data-mdb-placement="top"
                                        title="I like it"></i></button>
                                    </form>
                                @endif --}}

                                <i class="fas fa-share-alt text-muted p-md-1 my-1 me-2" data-mdb-toggle="tooltip"
                                        data-mdb-placement="top" title="Share this post"></i>
                                @if ($answer->userReaction())
                                    <button type="button" data-answer-id="{{ $answer->id }}" class="btn btn-outline-light text-danger p-md-1 my-1 me-0 remove-reaction" style="border: none; outline: none; background: transparent;">
                                        <i class="fa-solid fa-heart fs-6" data-mdb-toggle="tooltip" data-mdb-placement="top"
                                        title="Remove like"></i>
                                    </button>
                                @else
                                    <button type="button" data-answer-id="{{ $answer->id }}" class="btn btn-outline-light text-muted p-md-1 my-1 me-0 react" style="border: none; outline: none; background: transparent;">
                                        <i class="fa-regular fa-heart fs-6" data-mdb-toggle="tooltip" data-mdb-placement="top"
                                        title="I like it"></i>
                                    </button>
                                @endif
                            </div><br>
                            @if ($answer->comments->isNotEmpty())
                                <hr>
                                <div class="list-group">
                                    @foreach ($answer->comments->take(3) as $comment)
                                        <div class="list-group-item border-0 p-0 mb-2" style="background-color: #f8f8f8">
                                            <a href="#" class="text-decoration-none text-dark fw-bold">{{ $comment->user->name }}</a>
                                            &nbsp;
                                            <p class="d-inline fw-light">{{ $comment->body }}</p>
                                            <form action="{{ route('answer_comment.destroy', $comment->id ) }}" method="post">
                                                @method('DELETE')
                                                @csrf

                                                <p class="text-muted small d-inline me-1">{{ $comment->created_at->diffForHumans() }}</p>
                                                @if ($comment->user->id === Auth::id())
                                                    <button type="submit" class="border-0 bg-transparent small text-danger p-0"> Delete</button>
                                                @endif
                                            </form>
                                        </div>
                                        @if ($answer->comments->count() > 3 AND $loop->last)
                                            <li class="list-group-item border-0 p-0 text-dark mb-2" style="background-color: #f8f8f8">
                                                <a href="{{ route('answer_comment.show', $answer->id ) }}" class="text-decoration-underline text-muted small">View all {{ $answer->comments->count() }} comments</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                            <hr>
                            <form action="{{ route('answer_comment.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="answer_id" value="{{ $answer->id }}">
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
                        @if ($question->user->id === Auth::id() && $answer->user->id !== Auth::id())
                            @if ( $question->IsSelectedBestAnswer() )

                            @else
                                <div class="card-footer text-center">
                                    <form action="{{ route('SelectBestAnswer', $answer->id )}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-outline-primary w-50">Select this answer as a best answer <i class="fa-regular fa-thumbs-up"></i></button>
                                    </form>
                                </div>
                            @endif
                        @endif
                    </div>
                </section>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.remove-reaction', function() {
                let answer_id = $(this).data('answer-id');
                let self = this;
                $.ajax({
                    url: `/q-a/answer_reaction/${answer_id}`,
                    method: 'DELETE',
                    success: function(res) {
                        $(self).removeClass('remove-reaction')
                            .addClass('react')
                            .removeClass('text-danger')
                            .addClass('text-muted')
                            .find('i')
                            .addClass('fa-regular')
                            .removeClass('fa-solid')
                            .tooltip('hide')
                            .attr('data-mdb-original-title', 'I like it')
                            .tooltip('show');
                    },
                    headers : {
                        'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content'),
                    }
                });
            });

            $(document).on('click', '.react', function() {
                let answer_id = $(this).data('answer-id');
                let self = this;
                $.ajax({
                    url: `/q-a/answer_reaction`,
                    method: 'POST',
                    data: {
                        answer_id
                    },
                    success: function(res) {
                        $(self).addClass('remove-reaction')
                            .removeClass('react')
                            .addClass('text-danger')
                            .removeClass('text-muted')
                            .find('i')
                            .addClass('fa-solid')
                            .removeClass('fa-regular')
                            .attr('data-mdb-original-title', 'Remove like')
                            .tooltip('show');
                    },
                    headers : {
                        'X-CSRF-Token' : $('meta[name="csrf-token"]').attr('content'),
                    }
                });
            });
        });
    </script>
@endsection
