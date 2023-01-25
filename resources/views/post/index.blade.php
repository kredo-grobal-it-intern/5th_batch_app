@extends('layouts.app')

@section('title', 'All Post')

@section('content')
    <div class="row">
        <div class="col-3 border-end p-0">
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white" style="position: sticky; top: 150px; z-index: 999;">
                <div class="position-sticky">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action py-3 ripple" aria-current="true">
                            <i class="fa-solid fa-house-chimney me-3 fa-fw"></i><span>Home</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action py-3 ripple">
                            <i class="fa-solid fa-magnifying-glass me-3 fa-fw"></i><span>Search</span>
                        </a>
                        <a href="{{ route('posts.create') }}" class="list-group-item list-group-item-action py-3 ripple">
                            <i class="fa-solid fa-square-plus me-3 fa-fw"></i><span>Create a post</span>
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
            <div class="text-center p-4 bg-white mb-5" style="position: sticky; top: 0px; z-index: 999;">
                <h1 class="font-mask">All Post</h1>
                
            </div>
            @foreach ($all_posts as $post)
                <section class="mx-auto my-5 w-75">
                    <div class="card">
                        <div class="card-header" style="background-color: #faca7b">
                            <div class="row">
                                <div class="col-2">
                                    @if ($post->user->image)
                                        <i class="fa-solid fa-user"></i>
                                    @else
                                        <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" class="rounded-circle me-3" height="50px"
                                        width="50px" alt="avatar" />
                                    @endif
                                </div>
                                <div class="col-9">
                                    <h5 class="card-title font-weight-bold mb-2">{{ $post->user->name }}</h5>
                                    <p class="card-text"><i class="far fa-clock pe-2"></i>{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="col-1">
                                    @if($post->user->id === Auth::id())
                                        <div class="dropdown">
                                            <i class="fa-solid fa-ellipsis" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false"></i>
                                            {{-- <button class="btn" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button> --}}
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><button type="button" class="dropdown-item text-danger" data-mdb-toggle="modal" data-mdb-target="#deletePost-{{ $post->id }}"><i class="fa-solid fa-trash"></i> Delete</button></li>
                                                <li><button type="button" class="dropdown-item text-warning" data-mdb-toggle="modal" data-mdb-target="#editPost-{{ $post->id }}"><i class="fa-solid fa-pen-nib"></i> Edit</button></li>
                                            </ul>
                                        </div>
                                        {{-- <button type="button" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#deletePost-{{ $post->id }}">Delete</button>
                                        <button type="button" class="btn btn-white" data-mdb-toggle="modal" data-mdb-target="#editPost-{{ $post->id }}">Edit</button> --}}

                                        <!-- Modal for Delete-->
                                        <div class="modal fade" id="deletePost-{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="false">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header text-danger">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            <i class="fa-solid fa-circle-exclamation"></i> Delete post
                                                        </h5>
                                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure to delete this post?</p>
                                                        <h5>Body: {{ $post->body }}</h5>
                                                        @if ($post->image)
                                                            <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
                                                                <img src="{{ asset('/storage/images/posts/' . $post->image) }}" class="img-fluid" alt="{{ $post->image }}">
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
                                                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
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
                                        <div class="modal fade" id="editPost-{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="false">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color: #faca7b">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit your post</h5>
                                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mx-auto">
                                                            <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PATCH')
                                                                <label for="body" class="form-label">Body <span class="text-danger">*</span></label>
                                                                <textarea name="body" id="body" cols="30" rows="3" class="form-control mb-3">{{ $post->body }}</textarea>
                                                                <label for="image" class="form-label">Image</label>
                                                                <input type="file" id="image" name="image[]" class="form-control" multiple="multiple">
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
                        @if ($post->image)
                            <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
                                <img src="{{ asset('/storage/images/posts/' . $post->image) }}" class="img-fluid" alt="{{ $post->image }}">
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                        @endif
                        <div class="card-body" style="background-color: #f8f8f8">
                            <div class="mb-2">
                                <div class="d-flex">
                                    @if ($post->userReaction())
                                        <button type="button" data-post-id="{{ $post->id }}" class="btn btn-outline-light text-danger p-md-1 me-2 remove-reaction" style="border: none; outline: none; background: transparent;">
                                            <i class="fa-solid fa-heart fs-6" data-mdb-toggle="tooltip" data-mdb-placement="top"
                                            title="Remove like"></i>
                                        </button>
                                    @else
                                        <button type="button" data-post-id="{{ $post->id }}" class="btn btn-outline-light text-muted p-md-1 me-2 react" style="border: none; outline: none; background: transparent;">
                                            <i class="fa-regular fa-heart fs-6" data-mdb-toggle="tooltip" data-mdb-placement="top"
                                            title="I like it"></i>
                                        </button>
                                    @endif
                                    <a href="{{ route('posts.comments.index', ['post' => $post->id] ) }}">
                                        <i class="fa-regular fa-comment text-muted p-md-1 me-2" data-mdb-toggle="tooltip"
                                        data-mdb-placement="top" title="Comment"></i>
                                    </a>
                                    <i class="fas fa-share-alt text-muted p-md-1 me-2" data-mdb-toggle="tooltip"
                                        data-mdb-placement="top" title="Share this post"></i>
                                </div><br>
                                <p class="card-text" id="collapseContent{{ $post->id }}">{{ $post->body }}</p>
                            </div>
                            <div class="list-group">
                                {{-- @php
                                    $comments = $post->comments()->latest()->paginate(3);
                                @endphp
                                @foreach ($comments as $comment)
                                    <div class="list-group-item border-0 p-0 mb-2" style="background-color: #f8f8f8">
                                        <a href="#" class="text-decoration-none text-dark fw-bold">{{ $comment->user->name }}</a>
                                        &nbsp;
                                        <p class="d-inline fw-light">{{ $comment->body }}</p>
                                        <form action="{{ route('comments.destroy', $comment->id ) }}" method="post">
                                            @method('DELETE')
                                            @csrf

                                            <p class="text-muted small d-inline me-1">{{ $comment->created_at->diffForHumans() }}</p>
                                            @if ($comment->user->id === Auth::id())
                                                <button type="submit" class="border-0 bg-transparent small text-danger p-0"> Delete</button>
                                            @endif
                                        </form>
                                    </div>
                                @endforeach
                                <div class="mx-auto mt-3">
                                    {{ $comments->links() }}
                                </div> --}}


                                @foreach ($post->comments->take(3) as $comment)
                                    <div class="list-group-item border-0 p-0 mb-2" style="background-color: #f8f8f8">
                                        <a href="#" class="text-decoration-none text-dark fw-bold">{{ $comment->user->name }}</a>
                                        &nbsp;
                                        <p class="d-inline fw-light">{{ $comment->body }}</p>
                                        <form action="{{ route('posts.comments.destroy', ['post' => $post->id, 'comment' => $comment->id] ) }}" method="post">
                                            @method('DELETE')
                                            @csrf

                                            <p class="text-muted small d-inline me-1">{{ $comment->created_at->diffForHumans() }}</p>
                                            @if ($comment->user->id === Auth::id())
                                                <button type="submit" class="border-0 bg-transparent small text-danger p-0"> Delete</button>
                                            @endif
                                        </form>
                                    </div>
                                    @if ($post->comments->count() > 3 AND $loop->last)
                                        <li class="list-group-item border-0 p-0 mb-2" style="background-color: #f8f8f8">
                                            <a href="{{ route('posts.comments.show', ['post' => $post->id, 'comment' => $comment->id] ) }}" class="text-decoration-underline text-muted small">View all {{ $post->comments->count() }} comments</a>
                                        </li>
                                    @endif
                                @endforeach
                            </div>
                            {{-- <form action="{{ route('posts.comments.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <label for="comment" class="form-label">Comment</label>
                                <input type="text" name="comment" id="comment" class="form-control mb-3" placeholder="Add comments here!">
                                <div class="text-center mb-4">
                                    <button type="submit" class="btn w-50 mt-2 store-comment" style="background-color: #faca7b">Post your Comment</button>
                                </div>
                            </form> --}}
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
                let post_id = $(this).data('post-id');
                let self = this;
                $.ajax({
                    url: `/posts/${post_id}/likes`,
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
                let post_id = $(this).data('post-id');
                let self = this;
                $.ajax({
                    url: `/posts/${post_id}/likes`,
                    method: 'POST',
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
