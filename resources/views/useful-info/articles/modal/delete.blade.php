<div class="modal fade" id="delete-article-{{ $news->id }}">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">

                <div class="col-4"></div>

                <h5 class="col-4 modal-title text-danger mx-auto" id="modalTitleId">
                    <i class="fa-solid fa-circle-exclamation me-2"></i>Delete Article
                </h5>

                <div class="col-4">                                    {{-- ⬇️ bootstrap だと bs と書いてあるから mdb に変えないと mdbootstrap が効かない ＝ closeボタン押しても反応しない--}}
                    <button type="button" class="btn-close float-end" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body">
                <p>Are you sure to delete this article?</p>
                
                @if($news->image)
                    <img src="{{ $news->image }}" class="w-100 p-0 rounded-top" alt="" >
                @else
                    <a href="{{$news->url}}" style="max-height: 120px">No image</a>
                @endif
            
                <div class="mt-2">{{ $news->title }}</div>
            </div>      
                
            <div class="modal-footer">
                <form action="" method="post" class="w-100">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-outline-danger col-5 float-start" data-mdb-dismiss="modal" aria-label="Close">Close</button>
                    <button type="submit" class="btn btn-danger col-5 float-end">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- {{ route('article.destroy', $news) }} --}}
{{-- 
<!-- Modal -->
<div class="modal top fade" id="delete-article-{{$article->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog  ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">...</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div> --}}