@extends('layouts.app')


@section('content')
    <div class="container-fluid p-0 m-0"> 
        <div class="row">
            <div class="col-3 d-flex align-items-end">
                <a href="/pet-news" class="ms-4 fs-5 text-black">
                    Useful Information<iconify-icon inline icon="material-symbols:newspaper" title="News" class="fs-4 ms-2"></iconify-icon>
                </a>
            </div>
            <h1 class="col-6 text-center">Find</h1>
            <div class="col-3"></div>
        </div>
        <div class="row text-center" style="height: 75px;">
            @include('menu-bar.menu')
        </div> 

        <div class="row mt-5 mx-auto">
            <input id="pac-input" class="controls w-50 mt-4 ms-5 ps-4 fs-6" type="text" placeholder="Search Box" style="height: 40px;" />
            <div id="map" style=" height: 600px;" class="col-8 mx-auto p-0" ></div>
        </div>
    </div>

    @section('scripts')
        @parent
        <script src="{{ mix('js/map.js') }}"></script>        
        <script src="{{ mix('js/categories.js') }}"></script>      
        
        <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.mapApiKey.key') }}&callback=initMap&libraries=places&v=weekly" defer></script>
    @stop


@endsection
