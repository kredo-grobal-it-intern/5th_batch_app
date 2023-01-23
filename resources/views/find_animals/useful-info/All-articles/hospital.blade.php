@extends('layouts.app')

@section('title', 'Useful Information')

@section('content')
<div class="container-fluid p-0 m-0"> 
    <div class="row">
        <div class="col-4 mx-auto mt-3">
            <a href="/pet-news" class="text-decoration-none ms-5">Useful Information</a>
        </div>
        <h1 class="col-4 text-center ">Hospital</h1>

        <div class="col-4"></div>
    </div>
    <div class="row text-center" style="height: 75px;">
        @include('menu-bar.menu')
    </div>
</div>

<div class="container text-center mt-5">
    <div class="col">                      {{-- なぜか method で post 使うとエラー出る --}}
        <form action="/pet-news/show/result" method="get" class="col-5 mx-auto">
            @csrf
            <div class="input-group">         
            {{--         ⬇️ type:search->search box内に Xボタンが出る      ⬇️ form-control ないとsearch の枠線がやたら強調されてしまう --}}
                <input type="search" name="search" class="form-control" placeholder="Search article">
                <button type="submit" class="btn btn-outline-warning">Search</button>
            </div>
        </form>
        <div class="row row-cols-4">
            @foreach($hospital_news as $hospital)
                <div class="col mt-5 card p-0" style="max-height:300px;">
                    <a href="{{ route('pet-news.show', $hospital->id) }}" class="card-body">
                        @if($hospital->image)
                            <img src="{{ $hospital->image }}" class="w-100 rounded-top" alt="" style="max-height: 150px;">
                        @else
                            <i class="fa-regular fa-image-slash bg-info"></i>
                            <p class="">No Image</p>
                        @endif
                    </a>
                    <a href="{{ route('pet-news.show', $hospital->id) }}" class="card-footer overflow-scroll" style="max-height: 50px;">
                        {{ $hospital->title }}
                    </a>
                </div>
            @endforeach
        </div>

        <div class="row mt-5">
            <div class="col"></div>
            <div class="col">{{ $hospital_news->links() }}</div>
            <div class="col"></div>
        </div>
        
    </div>
</div>
@endsection