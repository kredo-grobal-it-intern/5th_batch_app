@extends('layouts.app')

@section('title', 'Useful Information')

@section('content')
<div class="container-fluid p-0 m-0"> 
    <div class="row">
        <div class=""></div>
        <h1 class="text-center " style="font-size: 4rem;">Find</h1>
    </div>
    
    <h3 class="text-center ">What kind of location would you like to find?</h3>
    <div class="row text-center" style="height: 75px;">
        @include('menu-bar.menu')
    </div>
</div>

<div class="container text-center">
    <div class="row">
        <div class="col-10 mt-5">
            <iframe id='map' src='https://www.google.com/maps/embed/v1/place?key={{ config("services.google-map.apikey") }}&q=tokyo animal hospital"' width='100%' height='600' frameborder='0' class=" shadow-5"></iframe>

            <div class="row mt-4">
                <div class="col-3">
                    <div class="card">
                        <a href="" class="btn text-decoration-none card-body shadow-0" style="height: 75px;" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                            image
                        </a>
                        <a href="" class="card-footer">
                            animal clinic
                        </a>
                    </div>
                    @include('maps.card')
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            image
                        </div>
                        <div class="card-footer">
                            dog clinic
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            image
                        </div>
                        <div class="card-footer">
                            pet clinic
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card" style="background-color: rgba(132, 132, 132, 0.3);">
                        <a href="http://127.0.0.1:8000/map/all" class="card-body" style="height: 75px;">
                            <i class="fa-solid fa-ellipsis"></i>
                        </a>
                        <div class="card-footer">
                            <a href="http://127.0.0.1:8000/map/all" class="text-decoration-none">View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{-- Saved articles --}}
        <div class="col-2 p-0 mt-5" style="height: 600px;">
            <h3 class="text-start m-0">Saved</h2>
            <hr class="w-100 m-0 border border-2 border-dark">
<!-- card -->
            <div class="row mt-3 w-100 mx-auto shadow-5">
                <div class="card p-0">
                    <a href="" class="btn text-decoration-none card-body shadow-0" style="height: 70px;" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                        image
                    </a>
                    <div class="card-footer">
                        animal clinic
                    </div>
                    @include('maps.card')
                </div>
                <div class="card p-0 mt-2">
                    <a href="" class="btn text-decoration-none card-body shadow-0" style="height: 70px;" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                        image
                    </a>
                    <div class="card-footer">
                        animal clinic
                    </div>
                    @include('maps.card')
                </div>
                <div class="card p-0 mt-2">
                    <a href="" class="btn text-decoration-none card-body shadow-0" style="height: 70px;" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                        image
                    </a>
                    <div class="card-footer">
                        animal clinic
                    </div>
                    @include('maps.card')
                </div>
                <div class="card mt-2" style="background-color: rgba(132, 132, 132, 0.3);">
                    <a href="http://127.0.0.1:8000/map/saved" class="card-body" style="height: 75px;">
                        <i class="fa-solid fa-ellipsis"></i>
                    </a>
                    <div class="card-footer">
                        <a href="http://127.0.0.1:8000/map/saved" class="text-decoration-none">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection