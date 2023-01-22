@extends('layouts.app')

@section('title', 'All Q&A')

@section('content')
    <div class="row">
        <div class="col-3 border-end p-0">
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white" style="position: sticky; top: 150px; z-index: 999;">
                <div class="position-sticky">
                    <div class="list-group list-group-flush">
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
            <div class="text-center p-4 bg-white" style="position: sticky; top: 0px; z-index: 999;">
                <h1 class="font-mask">All Questions</h1>
            </div>
            @foreach ($all_questions as $question)
                <section class="mx-auto my-5 w-75">
                    <div class="card">
                        <div class="card-header" style="background-color: #faca7b">
                            <div class="row">
                                <div class="col-2">
                                    @if ($question->user->image)
                                        <i class="fa-solid fa-user"></i>
                                    @else
                                        <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" class="rounded-circle me-3" height="50px"
                                        width="50px" alt="avatar" />
                                    @endif
                                </div>
                                <div class="col-9">
                                    <div>
                                        <h5 class="card-title font-weight-bold mb-2">{{ $question->user->name }}</h5>
                                        <p class="card-text"><i class="far fa-clock pe-2"></i>{{ $question->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="col-1">
                                    @if($question->user->id === Auth::id())
                                        <div class="dropdown">
                                            <i class="fa-solid fa-ellipsis" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false"></i>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><button type="button" class="dropdown-item text-danger" data-mdb-toggle="modal" data-mdb-target="#deleteQuestion-{{ $question->id }}"><i class="fa-solid fa-trash"></i> Delete</button></li>
                                                <li><button type="button" class="dropdown-item text-warning" data-mdb-toggle="modal" data-mdb-target="#editQuestion-{{ $question->id }}"><i class="fa-solid fa-pen-nib"></i> Edit</button></li>
                                            </ul>
                                        </div>

                                        <!-- Modal for Delete-->
                                        <div class="modal fade" id="deleteQuestion-{{ $question->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="false">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header text-danger">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            <i class="fa-solid fa-circle-exclamation"></i> Delete question
                                                        </h5>
                                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure to delete this question?</p>
                                                        <h5>Title: {{ $question->title }}</h5>
                                                        @if ($question->image)
                                                            <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
                                                                <img src="{{ asset('/storage/images/questions/' . $question->image) }}" class="img-fluid" alt="{{ $question->image }}">
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
                                                        <form action="{{ route('questions.destroy', $question->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-outline-danger btn-sm" data-mdb-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal for Edit-->
                                        <div class="modal fade" id="editQuestion-{{ $question->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="false">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color: #faca7b">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit your question</h5>
                                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mx-auto">
                                                            <form action="{{ route('questions.update', $question->id) }}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PATCH')
                                                                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                                                <input type="text" name="title" id="title" class="form-control mb-3" value="{{ $question->title }}">
                                                                <div class="mb-3">
                                                                    <label for="category" class="form-label d-block">Category <span class="text-danger">*</span></label>
                                                                    @foreach ($all_question_categories as $category)
                                                                        <div class="form-check form-check-inline">
                                                                            <?php
                                                                                $selectedCategories = [];
                                                                                foreach ($question->selectedCategories as $selected_category):
                                                                                    $selectedCategories[] = $selected_category->id;
                                                                                endforeach;
                                                                            ?>
                                                                            @if (in_array($category->id, $selectedCategories))
                                                                                <input type="checkbox" name="category[]" id="{{ $category->name }}" value="{{ $category->id }}"
                                                                                    class="form-check-input" checked>
                                                                                <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>
                                                                            @else
                                                                                <input type="checkbox" name="category[]" id="{{ $category->name }}" value="{{ $category->id }}"
                                                                                    class="form-check-input">
                                                                                <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>
                                                                            @endif
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
                                                                <textarea name="content" id="content" cols="30" rows="3" class="form-control mb-3">{{ $question->content }}</textarea>
                                                                <label for="image" class="form-label">Image</label>
                                                                <input type="file" name="image" id="" class="form-control">
                                                                <div class="form-text mb-3">
                                                                    The acceptable formats are jpeg,jpm,png, and gif only. Max file size: 1048kb
                                                                </div>
                                                                <div class="text-center">
                                                                    <button type="submit" class="btn w-50 mt-2" style="background-color: #faca7b">Update changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="container" style="background-color: #f8f8f8">
                            <div class="d-flex justify-content-between">
                                <span class="px-3 py-2">Category:
                                    @foreach ($question->selectedCategories as $selected_category)
                                        <span class="badge bg-opacity-50" style="background-color: #faca7b">
                                            {{ $selected_category->name }}
                                        </span>
                                    @endforeach
                                </span>
                                @if ($question->IsSelectedBestAnswer())
                                    <span class="badge bg-opacity-50 my-auto pt-2" style="background-color: green; height: 30px; width: 80px;">Solved <i class="fa-regular fa-circle-check" style="color: #faca7b"></i></span>
                                @else
                                    <span class="badge bg-opacity-50 my-auto pt-2" style="background-color: skyblue; height: 30px; width: 150px;">Answer acceptance <i class="fa-solid fa-paw"></i></span>
                                @endif
                            </div>
                            <h4 class="card-title text-decoration-underline px-3 py-3 mb-0" style="background-color: #f8f8f8">Q. {{ $question->title }}</h4>
                        </div>
                        @if ($question->image)
                            <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
                                <img src="{{ asset('/storage/images/questions/' . $question->image) }}" class="img-fluid" alt="{{ $question->image }}">
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                        @endif
                        <div class="card-body" style="background-color: #f8f8f8">
                            <p class="card-text collapse" id="collapseContent{{ $question->id }}">{{ $question->content }}</p>
                            <div class="d-flex justify-content-between mb-3">
                                <div class="div">
                                    <a class="btn btn-link link-danger p-md-1 my-1 fs-6 border border-danger" data-mdb-toggle="collapse" href="#collapseContent{{ $question->id }}"
                                        role="button" aria-expanded="false" aria-controls="collapseContent">Read more</a>
                                        @if ($question->answers->count() > 0)
                                            <a href="{{ route('answers.show', $question->id ) }}" class=""><i class="fa-solid fa-comment p-md-1 my-2 ms-2" data-mdb-toggle="tooltip"
                                                data-mdb-placement="top" title="Show All Answers"> {{$question->answers->count()}}</i></a>
                                        @else
                                            <i class="fa-solid fa-comment p-md-1 my-2 ms-2" data-mdb-toggle="tooltip" data-mdb-placement="top" title="No answers yet"> {{$question->answers->count()}}</i>
                                        @endif
                                </div>
                                <div class="d-inline d-flex">
                                    <i class="fas fa-share-alt text-muted p-md-1 my-2 me-2" data-mdb-toggle="tooltip"
                                        data-mdb-placement="top" title="Share this post"></i>
                                    @if ($question->userReaction())
                                        <button type="button" data-question-id="{{ $question->id }}" class="btn btn-outline-light text-danger p-md-1 my-1 me-0 remove-reaction" style="border: none; outline: none; background: transparent;">
                                            <i class="fa-solid fa-heart fs-6" data-mdb-toggle="tooltip" data-mdb-placement="top"
                                            title="Remove like"></i>
                                        </button>
                                    @else
                                        <button type="button" data-question-id="{{ $question->id }}" class="btn btn-outline-light text-muted p-md-1 my-1 me-0 react" style="border: none; outline: none; background: transparent;">
                                            <i class="fa-regular fa-heart fs-6" data-mdb-toggle="tooltip" data-mdb-placement="top"
                                            title="I like it"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <form action="{{ route('answers.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="question_id" value="{{ $question->id }}">
                                <label for="answer" class="form-label">Answer</label>
                                <input type="text" name="answer" id="answer" class="form-control mb-3" placeholder="Write your idea here!">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="" class="form-control">
                                <div class="form-text mb-3">
                                    *The acceptable formats are jpeg,jpm,png, and gif only. Max file size: 1048kb
                                </div>
                                <div class="text-center mb-4">
                                    <button type="submit" class="btn w-50 mt-2" style="background-color: #faca7b">Post your Answer</button>
                                </div>
                            </form>
                        </div>
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
                let question_id = $(this).data('question-id');
                let self = this;
                $.ajax({
                    url: `/q-a/question_reaction/${question_id}`,
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
                let question_id = $(this).data('question-id');
                let self = this;
                $.ajax({
                    url: `/q-a/question_reaction`,
                    method: 'POST',
                    data: {
                        question_id
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
