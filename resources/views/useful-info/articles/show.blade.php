@extends('layouts.app')

@section('title', 'Useful Information')

@section('content')


<div class="container text-center">
    <div class="row">
            <h1 class="col-11 fw-bolder" style="font-size: 3.5rem;">{{ $news->title }}</h1>

            {{-- <button type="submit" class="btn btn-sm shadow-none p-0 ms-4 pb-3">
                <i class="fa-regular fa-bookmark fs-1 float-end mt-3 text-warning"></i>
            </button> --}}
            
            @if($news->isSaved())
                <form action="{{ route('pet-news.save.destroy', $news->id) }}" method="post" class="col-1 my-auto">
                    @csrf
                    @method('DELETE')
                    {{-- To get post_id --}}
                    <input type="hidden" name="news_id" value="{{ $news->id }}">

                    <button type="submit" class="btn btn-sm shadow-none p-0 ">
                        <i class="fa-regular fa-bookmark float-end text-warning" style="font-size: 3rem;"></i>
                    </button>
                </form>
            @else
                <form action="{{ route('pet-news.save.store', $news->id) }}" method="post" class="col-1 my-auto">
                    @csrf                    
                    {{-- To get post_id --}}
                    <input type="hidden" name="news_id" value="{{ $news->id }}">

                    <button type="submit" class="btn btn-sm shadow-none p-0">
                        <i class="fa-regular fa-bookmark float-end" style="font-size: 3rem;"></i>
                    </button>
                </form>
            @endif
    </div>

    <div class="row  mt-5 ">
        <div class="col-5  p-0">
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
        </div>
        <div class="col-1"></div>
        <div class="col-6 p-0">
            <div class=" bg-warning">
                <p class="fs-4">{{ $news->description }}</p>
            </div>
            <div class="">
                <a href="{{ $news->url }}" class="fs-5 float-end">Go Reference</p>
            </div>

        </div>
    </div>
    <div class="row mt-5">
        @if($bookmark)
            <a href="{{ route('pet-news.show.saved') }}" class="d-block col-4 btn btn-warning fs-6">Saved</a>
            <div class="col"></div>
            <a href="/pet-news" class="col-4 d-block btn btn-primary fs-6">Useful Information</a>
        @else
            <a href="/pet-news" class="col-4 d-block mx-auto btn btn-primary fs-6">Useful Information</a>
        @endif        
    </div>
</div>
@endsection