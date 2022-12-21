<div class="mt-3">
    @if ($post->comments->isNotEmpty())
        {{-- // if comments table is not emtpy - will return true/ if otherwise, it will return false --}}
        <hr>
        <ul class="list-group">
            @foreach ($post->comments->take(3) as $comment)
                <li class="list-group-item border-0 p-0 mb-2">
                    <a href="#" class="text-decoration-none text-dark fw-bold">
                        {{ $comment->user->name }}
                    </a>
                    <p class="d-inline fw-light">{{ $comment->body }}</p>

                    <form action="{{ route('comments.destroy',$comment->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <span class="text-muted xsmall">
                            {{ $comment->created_at->diffForHumans() }} &middot;
                            @if (Auth::user()->id === $comment->user->id)
                                <button type="submit" class="border-0 bg-transparent text-danger p-0">Delete</button>
                            @endif
                        </span>
                    </form>

                    @if ($post->comments->count() > 3)
                    {{-- this will only work if youre isnide the loop --}}
                        @if ($loop->last)
                            <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none mt-3">
                                View all {{ $post->comments->count() }} comments
                            </a>
                        @endif
                    @endif
                </li>
            @endforeach

        </ul>
    @endif

    <form action="{{ route('comments.store') }}" method="post">
        @csrf

        <div class="input-group">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <textarea name="body" id="" rows="1" class="form-control form-control-sm" placeholder="Add a comment"></textarea>
            <button type="submit" class="btn btn-outline-secondary btn-sm">Post</button>
        </div>
    </form>
</div>
