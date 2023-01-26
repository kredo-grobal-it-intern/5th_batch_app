@extends('layouts.app')

@section('title', 'Saved Articles')

@section('content')
<div class="container-fluid p-0 m-0"> 
    <div class="row">
        <div class="col-4 d-flex align-items-end">
            <a href="/pet-news" class="ms-4 fs-5 text-black">
                Useful Information<iconify-icon inline icon="material-symbols:newspaper" title="News" class="fs-4 ms-2"></iconify-icon>
            </a>
        </div>
        <h1 class="col-4 text-center ">Saved</h1>

        <div class="col-4"></div>
    </div>
    <div class="row text-center" style="height: 75px;">
        @include('menu-bar.menu')
    </div>
</div>

<div class="container text-center mt-5">
    <div class=""> 
        <div class="row row-cols-4">
            @foreach($saved_news as $saved)
                <div class="col">
                    <div class="col-11 mx-auto mt-5 card p-0" style="max-height:300px;">
                        <a href="{{ route('pet-news.show', $saved->news->id) }}" class="card-body p-0">
                            @if($saved->news->image)
                                <img src="{{ $saved->news->image }}" class="w-100 rounded-top" alt="" style="max-height: 150px;">
                            @else
                                <p class="m-0  d-flex align-items-center justify-content-center" style="height: 150px;">No Image</p>
                            @endif
                        </a>
                        <a href="{{ route('pet-news.show', $saved->news->id) }}" class="card-footer overflow-scroll" style="max-height: 50px;">
                            {{ $saved->news->title }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row mt-5">
            <div class="col"></div>
            <div class="col">{{ $saved_news->links() }}</div>
            <div class="col"></div>
        </div>
        
    </div>
</div>
@endsection