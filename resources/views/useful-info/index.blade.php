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
<!-- card -->
            {{-- @foreach($savedNews as $savedNews)
                @if($savedNews->user->id == Auth::user()->id)
                        
                        <p class="bg-primary">{{$savedNews->news->title}}</p>
                    @else
                    
                        <p class="bg-primary text-white"></p>
                        <div class="row mt-3 w-100 mx-auto">
                            <div class="col-6 border">
                                <a href=""><img src="/strage/images/images.jpeg" alt="img"></a>
                            </div>
                            <div class="col-6 border p-0">
                                <a href="" class="text-decoration-none text-dark">
                                    <span>{{$savedNews->title}}</span>
                                </a>
                            </div>
                        </div>
                @endif
                
            @endforeach  --}}
            


{{-- {{$savedNews}} --}}
            <div class="row mt-3 w-100 mx-auto">
                <div class="col-6 border">
                    <a href=""><img src="/strage/images/images.jpeg" alt="img"></a>
                </div>
                <div class="col-6 border p-0">
                    <a href="" class="text-decoration-none text-dark">
                        <span>New Open!</span><br>
                        <span> Animal Cafe</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($saved as $savedNews)
        <div class="col-5 mx-auto mt-4 card p-0" style="max-height: 120px">
            <a href="{{ route('pet-news.show', $savedNews->news->id) }}" class="card-body  p-0"> 
                @if($savedNews->news->image)
                    <img src="{{ $savedNews->news->image }}" class="w-100 p-0 rounded-top" alt="" style="max-height:90px;">
                @else
                    <p style="max-height: 120px">No Image</p>
                @endif
            </a>
            <a href="{{ route('pet-news.show', $savedNews->news->id) }}" class="card-footer overflow-scroll p-1">
                {{ $savedNews->news->title }}
            </a>
        </div>
                {{-- {{$news->news}} --}}
            
        @endforeach
    </div>
</div>
@endsection