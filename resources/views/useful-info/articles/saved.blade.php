@extends('layouts.app')

@section('title', 'Useful Information')

@section('content')
<div class="container-fluid p-0 m-0"> 
    <div class="row">
        <div class="col-4"></div>
        <h1 class="col-4 text-center ">Saved Article</h1>
    </div>
</div>

<div class="container text-center mt-4">
    <div class="row">
        <div class="mb-3">
            <a href="{{ route('article.index') }}" type="button" class="btn float-start text-decoration-none border">Useful Information</a>
        </div>
        <div class="col-3">
            <div class="card p-0">
                <a href="" class="card-body  p-0">
                    <p class="" style="height: 100px">image</p>
                </a>
                <a href="" class="card-footer p-1">
                    title
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="card p-0">
                <a href="" class="card-body  p-0">
                    <p class="" style="height: 100px">image</p>
                </a>
                <a href="" class="card-footer p-1">
                    title
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="card p-0">
                <a href="" class="card-body  p-0">
                    <p class="" style="height: 100px">image</p>
                </a>
                <a href="" class="card-footer p-1">
                    title
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="card p-0">
                <a href="" class="card-body  p-0">
                    <p class="" style="height: 100px">image</p>
                </a>
                <a href="" class="card-footer p-1">
                    title
                </a>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-3">
            <div class="card p-0">
                <a href="" class="card-body  p-0">
                    <p class="" style="height: 100px">image</p>
                </a>
                <a href="" class="card-footer p-1">
                    title
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="card p-0">
                <a href="" class="card-body  p-0">
                    <p class="" style="height: 100px">image</p>
                </a>
                <a href="" class="card-footer p-1">
                    title
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="card p-0">
                <a href="" class="card-body  p-0">
                    <p class="" style="height: 100px">image</p>
                </a>
                <a href="" class="card-footer p-1">
                    title
                </a>
            </div>
        </div>
        <div class="col-3">
            <div class="card p-0">
                <a href="" class="card-body  p-0">
                    <p class="" style="height: 100px">image</p>
                </a>
                <a href="" class="card-footer p-1">
                    title
                </a>
            </div>
        </div>
    </div>


        
    
</div>
@endsection