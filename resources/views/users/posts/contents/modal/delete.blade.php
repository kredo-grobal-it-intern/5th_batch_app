<div class="modal fade" id="delete-post-{{ $post->id }}">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content border-danger">
            <div class="modal-header ">
                <h5 class="modal-title text-danger" id="modalTitleId">Delete post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('/storage/images/' . $post->image) }}" alt="" class="img-thumbnail">
                <p class="mt-3">
                    Are you sure to delete post {{ $post->id }} ?
                </p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
