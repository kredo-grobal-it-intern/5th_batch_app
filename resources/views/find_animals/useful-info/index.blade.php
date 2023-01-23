@extends('layouts.app')

@section('title', 'Useful Information')

@section('content')
<div class="container-fluid p-0 m-0"> 
    <div class="row">
        <div class="col-3"></div>
        <h1 class="col-6 text-center ">Useful Information</h1>
        <a href="/map" class="col-3 mt-3 text-end text-decoration-none fs-4 text-dark">
            <iconify-icon inline icon="fluent-emoji-high-contrast:dog" flip="horizontal"></iconify-icon>
            Find
        </a>
    </div>
    <div class="row text-center" style="height: 75px;">
        @include('menu-bar.menu')
    </div>
</div>

<div class="container text-center">
    <div class="row">
        @include('useful-info.articles.cards')

        <div class="col"></div>
{{-- Saved articles --}}
    



        <div class="col-2 p-0 mt-5" style="height: 500px;">
            <h3 class="text-start m-0">Saved</h2>
            <hr class="w-100 m-0 border border-2 border-dark">

{{-- {{$savedNews}} --}}
            <div class="">
                @foreach($saved->take(4) as $savedNews)
                    <div class=" mx-auto my-3 card p-0" type="button" onclick="location.href='{{ route('pet-news.show', $savedNews->news->id) }}'" >
                        <div href="{{ route('pet-news.show', $savedNews->news->id) }}" class="p-0" > 
                            @if($savedNews->news->image)
                                <img src="{{ $savedNews->news->image }}" class="w-100 p-0 rounded" alt="" style="max-height:80px;">
                            @else
                                <p style="height: 80px">No Image</p>
                            @endif
                        </div>
                    </div>
                @endforeach

                {{-- $saved contains data whose user_id =- Auth::user()->id --}}
                @if($saved->count() > 4)
                    <div class="card" type="button" onclick="location.href='{{ route('pet-news.show.saved') }}'" style="height: 80px; background-color: rgba(255, 187, 0, 0.5);">
                        <p class="my-auto">View All</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection