@extends('layouts.app')

@section('title', 'Donate page')

@section('content')

<div class="row mb-3">
    <div class="col-4 display-5" style=" background-color:#F096A0">
        Request for Support
    </div>
    <div class="col-8">
        This website is seeking your support for Tokyo Cat Guardian, a non-profit organization that manages this site.
        Your support will be used to help us operate this site and to protect animals.
        We appreciate your cooperation.
    </div>
</div>



<div class="row mt-5">
    <div class="col-4 display-5" style=" background-color:#F096A0">
        Donation Method
    </div>
    <div class="col-8">
        <i class="fa-sharp fa-solid fa-money-bill-1-wave">$1000 -> <i class="fa-solid fa-fish"></i>×5</i>
        <br>
        1,000 yen donation provides 5 days of food for kittens
        <a href="{{ route('card.pay') }}">Please check</a>
        </div>
</div>


@endsection
