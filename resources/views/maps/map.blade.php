@extends('layouts.app')

@section('title', 'test')

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


    <div class="mt-5 col-8 mx-auto" style="">
        <input id="pac-input" class="controls w-50 mt-4 ms-5 ps-4 fs-6" type="text" placeholder="Search Box" style="height: 40px; position: relative; left: 20px;" />
        <div id="map" style="width: 100%; height: 600px;" class="mx-auto" ></div>
    </div>

    @section('scripts')
        @parent
        
        <script src="{{ asset('js/map.js') }}"></script>        
        <script src="{{ asset('js/categories.js') }}"></script>      
        
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHVRtk7mVuu7aV9GBFzCrB5jd0jdxoXiE&callback=initMap&libraries=places&v=weekly" defer></script>

    @stop


@endsection
