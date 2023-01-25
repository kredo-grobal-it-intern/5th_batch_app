@extends('layouts.app')

@section('title', 'Useful Information')

@section('content')
<div class="container-fluid p-0 m-0"> 
    <div class="row">
        <div class="col-4 d-flex align-items-end">
            <a href="/pet-news" class="ms-4 fs-5 text-black">
                Useful Information<iconify-icon inline icon="material-symbols:newspaper" title="News" class="fs-4 ms-2"></iconify-icon>
            </a>
        </div>
        <h1 class="col-4 text-center ">Cafe</h1>

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
            @foreach($cafe_news as $cafe)
                <div class="col mt-5 card p-0" style="max-height:300px;">
                    <a href="{{ route('pet-news.show', $cafe->id) }}" class="card-body">
                        @if($cafe->image)
                            <img src="{{ $cafe->image }}" class="w-100 rounded-top" alt="" style="max-height: 150px;">
                        @else
                            <i class="fa-regular fa-image-slash bg-info"></i>
                            <p class="">No Image</p>
                        @endif
                    </a>
                    <a href="{{ route('pet-news.show', $cafe->id) }}" class="card-footer overflow-scroll" style="max-height: 50px;">
                        {{ $cafe->title }}
                    </a>
                </div>
            @endforeach
        </div>

        <div class="row mt-5">
            <div class="col"></div>
            <div class="col">{{ $cafe_news->links() }}</div>
            <div class="col"></div>
        </div>
        
    </div>
</div>
@endsection