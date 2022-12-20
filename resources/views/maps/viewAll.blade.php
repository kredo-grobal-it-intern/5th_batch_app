@extends('layouts.app')

@section('title', 'Useful Information')

@section('content')
<div class="container-fluid p-0 m-0"> 
    <div class="row">
        <h1 class="col text-center " style="font-size: 4rem;">View All</h1>
    </div>
</div>

<div class="container text-center">
    <div class="row gx-3">
        <div class="mb-3">
            <a href="http://127.0.0.1:8000/map" type="button" class="btn float-start text-decoration-none border">View Map</a>
        </div>
        <div class="col-3">
            <div class="card">
                <a href="" class="btn text-decoration-none card-body shadow-0" style="height: 150px" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                    image
                </a>
                <a href="" type="button" class="text-decoration-none card-footer" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                    Animal Clinic
                </a>
            </div> 
            @include('maps.card')
        </div>

    

        <div class="col-3">
            <div class="card">
                <a href="" class="text-decoration-none card-body" style="height: 150px">
                    image
                </a>
                <a href="" class="text-decoration-none card-footer">
                    Animal Clinic
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <a href="" class="text-decoration-none card-body" style="height: 150px">
                    image
                </a>
                <a href="" class="text-decoration-none card-footer">
                    Animal Clinic
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <a href="" class="text-decoration-none card-body" style="height: 150px">
                    image
                </a>
                <a href="" class="text-decoration-none card-footer">
                    Animal Clinic
                </a>
            </div>
        </div>
        
    </div>
    <div class="row gx-3 mt-5">
        <div class="col-3">
            <div class="card">
                <a href="" class="text-decoration-none card-body" style="height: 150px">
                    image
                </a>
                <a href="" class="text-decoration-none card-footer">
                    Animal Clinic
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <a href="" class="text-decoration-none card-body" style="height: 150px">
                    image
                </a>
                <a href="" class="text-decoration-none card-footer">
                    Animal Clinic
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <a href="" class="text-decoration-none card-body" style="height: 150px">
                    image
                </a>
                <a href="" class="text-decoration-none card-footer">
                    Animal Clinic
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <a href="" class="text-decoration-none card-body" style="height: 150px">
                    image
                </a>
                <a href="" class="text-decoration-none card-footer">
                    Animal Clinic
                </a>
            </div>
        </div>
        
    </div>
    <div class="mt-4">
        <a href="" class="text-decoration-none text-center">1 2 ></a>
    </div>
    
</div>
@endsection