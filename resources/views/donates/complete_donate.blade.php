@extends('layouts.app')

@section('title', 'Donate page')

@section('style')
     <link rel="stylesheet" href="{{ mix('/css/complete_donate.css') }}">
@endsection

@section('content')

<div class="row mt-5">
    <div class="col-5">
        <img src="{{ asset('/assets/images/donation.png') }}">
    </div>
    <div class="col-7">

        <div class="circle_check">
            <div class=""><i class="fa-solid fa-check"></i></div>
        </div>

          <div class="complete_message col-4">
            Donation Compeleted!
            <br>
            Thank you for your support!
         </div>

         {{-- Donate Again --}}
          <div><a href="{{ route('card.pay') }}"><div class="donate_again">Donate Again</div></a></div>

          {{-- Back homepage --}}
          <div><a href="{{ route('animal_care.index') }}"><div class="back_home link-dark">Back to homepage</div></a></div>
    </div>
</div>

@endsection
