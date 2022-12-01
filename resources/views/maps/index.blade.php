@extends('layouts.app')

@section('title', 'Useful Information')

@section('content')
<div class="container-fluid p-0 m-0"> 
    <div class="row">
        <div class="col-4"></div>
        <h1 class="col-4 text-center " style="font-size: 4rem;">Find</h1>
        
        <a href="file:///Users/kasugatakumi/Desktop/5th_batch_app/resources/views/maps/index.html" class="col-4 mt-3 text-end text-decoration-none fs-4 text-dark">
            <iconify-icon inline icon="fluent-emoji-high-contrast:dog" flip="horizontal"></iconify-icon>
            Find
        </a>
    </div>
    
    <h3 class="text-center ">What kind of location would you like to find?</h3>
    <div class="row text-center" style="height: 75px;">
        @include('menu-bar.menu')
    </div>
</div>

<div class="container text-center">
    <div class="row">
        <div class="col-10 mt-5">
            <iframe id='map' src='https://www.google.com/maps/embed/v1/place?key={{ config("services.google-map.apikey") }}&q=tokyo animal hospital"' width='100%' height='600' frameborder='0'></iframe>
        </div>

{{-- Saved articles --}}
        <div class="col-2 p-0 mt-5 bg-warning" style="height: 600px;">
            <h3 class="text-start m-0">Saved</h2>
            <hr class="w-100 m-0 border border-2 border-dark">
<!-- card -->
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
</div>
@endsection