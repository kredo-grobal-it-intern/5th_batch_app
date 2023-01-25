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
        <h1 class="col-4 text-center ">Result</h1>
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
                @if(count($all_results) < 1)
                    <div class="alert alert-warning mx-auto mt-5">
                        <strong>Sorry!</strong> No Article Found.
                    </div>                                      
                @else
                    @foreach($all_results as $result)
                        <div class="col mt-5 card p-0" style="max-height:300px;">
                            <a href="{{ route('pet-news.show', $result->id) }}" class="card-body">
                                @if($result->image)
                                    <img src="{{ $result->image }}" class="w-100 rounded-top" alt="" style="max-height: 150px;">
                                @else
                                    <i class="fa-regular fa-image-slash bg-info"></i>
                                    <p class="">No Image</p>
                                @endif
                            </a>
                            <a href="{{ route('pet-news.show', $result->id) }}" class="card-footer overflow-scroll" style="max-height: 50px;">
                                {{ $result->title }}
                            </a>
                        </div>
                    @endforeach
                @endif
                {{-- @if(count($all_results) < 1)
                    <div class="alert alert-warning">
                        <strong>Sorry!</strong> No Product Found.
                    </div>                                      
                @else
                    @foreach($products as $product)
                        //
                    @endforeach
                @endif --}}
            </div>
        
        <div class="row mt-5">
            <div class="col"></div>
            <div class="col">{{ $all_results->links() }}</div>
            <div class="col"></div>
        </div>
        
    </div>
</div>
@endsection