@extends('layouts.app')

@section('title', 'Top Page')

@section('content')
    <div class="position-relative" style="">
        <img src="{{ asset('/storage/images/resources/top_back_image.png') }}" class="position-absolute" style="top:100px; left: -25%; height: 410px; width: 340px; border-radius: 0px;" alt="top_back_image">
        <img src="{{ asset('/storage/images/resources/top_dog.png') }}" class="position-absolute" style="z-index: 1; top: 0px; right: -5%; height: 500px; width: 340px; border-radius: 0px;" alt="top_dog">
        <img src="{{ asset('/storage/images/resources/top_circle.png') }}" class="position-absolute" style="z-index: 2; top:70px; left: 6%; height: 110px; width: 280px;  border-radius: 0px;" alt="top_circle">
        <img src="{{ asset('/storage/images/resources/top_wave.png') }}" class="position-absolute" style="top:200px; right: -10%; height: 310px; width: 440px; border-radius: 0px;" alt="top_wave">
        <img src="{{ asset('/storage/images/resources/top_words.png') }}" class="position-absolute" style="z-index: 2; top:80px; left: 10%; height: 350px; width: 400px; border-radius: 0px;" alt="top_words">
    </div>
@endsection
