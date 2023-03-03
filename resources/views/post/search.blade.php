@extends('layouts.app')

@section('title', 'Search Post')

@section('content')
    <div class="row">
        <div class="col-3 border-end p-0">
            <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white" style="position: sticky; top: 150px; z-index: 999;">
                <div class="position-sticky">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action py-3 ripple" aria-current="true">
                            <i class="fa-solid fa-house-chimney me-3 fa-fw"></i><span>Home</span>
                        </a>
                        <a href="{{ route('posts.search') }}" class="list-group-item list-group-item-action py-3 ripple">
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
            <div class="text-center p-4 bg-white" style="position: sticky; top: 0px; z-index: 999;">
                <h1 class="font-mask">All Post</h1>
            </div>
            <form method="get" action="{{ route('posts.search') }}" class="form-inline">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="text" name="tag" class="form-control" value="{{ $tag }}" placeholder="Type Tags">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success">Search <i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                @foreach ($all_posts as $post)
                    <div class="col-3 mb-3">
                        <section class="mx-auto my-5 w-75">
                            <div class="card">
                                @if ($post->image)
                                    <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
                                        <a href="{{ route('posts.show', $post) }}">
                                            <img src="{{ asset('/storage/images/posts/' . $post->image) }}" class="img-fluid" alt="{{ $post->image }}">
                                        </a>
                                        {{-- <a href="#!">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                        </a> --}}
                                    </div>
                                @endif
                            </div>
                        </section>
                    </div>
                @endforeach
                {{-- @if (!empty($tag))
                    <div class="mx-auto mt-3">
                        {{ $all_posts->links() }}
                    </div>
                @endif --}}
            </div>
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
