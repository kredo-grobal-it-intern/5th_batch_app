@extends('layouts.app')

@section('title', 'Useful Information')

@section('content')
<div class="container-fluid p-0 m-0"> 
    <div class="row">
        <div class="col-4"></div>
        <h1 class="col-4 text-center ">Amusement Parks</h1>
    </div>
    <div class="row text-center" style="height: 75px;">
        @include('useful-info.menu-bar.menu')
    </div>
</div>

<div class="container text-center mt-5">
    <div class="row">
        <div class="bg-secondary opacity-50" style="height: 500px;">
            <h1 class="" style="margin-top: 20%;">all article of Amusement Park will be here </h1>
        </div>


        
    </div>
</div>
@endsection