@extends('layouts.app')

@section('title', 'Donate page')

@section('content')

<div class="row mt-5">
    <div class="col-5">
        <img src="{{ asset('/storage/images/donation.png') }}">
    </div>
    <div class="col-7">
        <div class="mx-auto row  text-center"  style=" height: 50px;background:#FACA7B;;border-radius: 12px;">
            <p class="h3 my-auto text-center">Request for Support</p>
       </div>
        <div class="p-3 m-3  mx-auto row h5"  style=" height: 170px;background:#F8F8F8;border-radius: 12px;">
            Each year, 4,059 dogs and 19,705 cats are killed and disposed of in Japan.
            <br>
            Some pets are killed by their owners or left behind in disasters.
            <br>
            We started this fundraiser because we want as many pets as possible to live.
        </div>

        <div class="mx-auto row m-2 text-center"  style=" height: 50px;background:#FACA7B;;border-radius: 12px;">
            <p class="h3 my-auto text-center">Donation Method</p>
       </div>

        <div class="p-4 m-3 mx-auto row h5 text-center"  style=" height: 150px;background:#F8F8F8;border-radius: 12px;">
                <div class="row">
                    <div class="col">
                        <img src="{{ asset('/storage/images/Vector.png') }}" style="width:75px ;height:75px;">
                    </div>
                    <div class="col">
                        <i class="fa-solid fa-arrow-right w-25" style="font-size: 60px;color:#FACA7B"></i>
                    </div>
                    <div class="col">
                        <i class="fa-solid fa-bowl-food w-25" style="font-size: 75px;color:#FACA7B"></i>
                    </div>
                </div>

                <div class="row">
                    <div class="col h5">
                    <p>$1000</p>
                    </div>
                    <div class="col">

                    </div>
                    <div class="col h5">
                        <p>5 days of food</p>
                    </div>
                </div>
        </div>

        <div class="mx-auto row  text-center"  style=" height: 70px;background:#FACA7B;;border-radius: 12px;">
            <p class="h3 my-auto text-center"><a href="{{ route('card.pay') }}">Donation Via Credit Card</a></p>
       </div>
</div>

@endsection
