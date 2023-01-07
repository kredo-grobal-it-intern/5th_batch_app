@extends('layouts.app')

@section('title', 'Useful Information')

@section('content')


<div class="container text-center">
    <div class="row">
        <div class="">
            <h1 class="fw-bolder d-inline" style="font-size: 4rem;">{{ $news->title }}</h1>

            <button type="submit" class="btn btn-sm shadow-none p-0 ms-4 pb-3">
                <i class="fa-regular fa-bookmark fs-1 float-end mt-3 text-warning"></i>
            </button>
            {{-- @if($news->isSaved())
                <form action="{{ route('save.destroy', $news->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    To get post_id
                    <input type="hidden" name="news_id" value="{{ $news->id }}">

                    <button type="submit" class="btn btn-sm shadow-none p-0">
                        <i class="fa-regular fa-bookmark fs-1 float-end mt-3 text-warning"></i>
                    </button>
                </form>
            @else
                <form action="{{ route('save.store', $news->id) }}" method="post">
                    @csrf                    
                     To get post_id 
                    <input type="hidden" name="news_id" value="{{ $post->id }}">

                    <button type="submit" class="btn btn-sm shadow-none p-0">
                        <i class="fa-regular fa-bookmark fs-1 float-end mt-3"></i>
                    </button>
                </form>
            @endif --}}
        </div>
    </div>

    <div class="row  mt-5 ">
        <div class="col-5  p-0">
            {{-- <img src="{{asset('')}}" alt=""> --}}
            <div class="bg-secondary w-100">
                <img src="{{ $news->image }}" class="w-100 p-0 rounded-top" alt="" >
            </div>
            <p class="text-end">
                created at: {{ $news->created_at }} <br>
                @if($news->author)
                    written by: {{ $news->author }}
                @else
                    none
                @endif
            </p>
            {{-- {{ $article->updated_at->diffForHumans() }} --}}

{{-- if 記載予定（article 書いた本人なら以下のボタンが出る） --}}
            <div class="">
                <a href="" type="button" class="btn btn-warning float-start col-5">Edit</a>
                
                <button type="button" class="btn btn-danger float-end col-5" data-mdb-toggle="modal" data-mdb-target="#delete-article-{{$news->id }}">Delete</button>
            </div>
            @include('useful-info.modal.delete')
            <!-- Button trigger modal -->
        </div>
        <div class="col-1"></div>
        <div class="col-6">
            <div class=" bg-warning">
                <p class="fs-4">{{ $news->description }}</p>
            </div>
            <div class="">
                <a href="{{ $news->url }}" class="fs-5">Go Reference</p>
            </div>

        </div>
        <a href="{{ url()->previous() }}" class="fs-4 w-50 text-decoration-none mt-5 mx-auto">Back</a>
    </div>
</div>
@endsection