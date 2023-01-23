@extends('layouts.app')

@section('title', 'Donate page')

@section('content')
   <div class="mt-5">
    <img src="{{ asset('/assets/images/animal_care.png') }}" class="rounded mx-auto d-block pt-1 rounded-7" width="200" height="200" style="border-radius: 30px" style="border: 6px solid #FFFFFF">
   </div>

   <div class="col-8 mx-auto">
    <div class="p-3 m-2 text-white  mx-auto row"  style=" height: 340px;background:#F8F8F8;">
        <div class="col p-4">
            <div class="text-right"><a href="{{ route('find_animal.index') }}"><i class="fa-solid fa-dog link-warning w-25" style="font-size: 40px "></i></a></div>
            <div class="text-right text-bold h3 text-dark pt-1">Find a Pet</div>
            <div class="text-right text-dark pt-1">You can find a dog you like and contact the owner.Most of the animals listed here are protected according to guidance from government agencies (police and protection).</div>
        </div>
        <div class="col p-4">
            <div class="text-right "><a href="{{ route('card.index') }}"><i class="fa-solid fa-hand-holding-dollar link-warning w-25" style="font-size: 40px "></i></a></div>
            <div class="text-right text-bold h3 text-dark pt-1">Donation</div>
             <div class="text-right text-dark pt-1">We send the money raised to animal shelters to support the lives of the animals.</div>
        </div>
        <div class="col p-4">
            <div class="text-right "><a href="{{ route('publication.index') }}"><i class="fa-solid fa-users link-warning w-25" style="font-size: 40px "></i></a></div>
            <div class="text-right text-bold h3 text-dark pt-1">Adopt a foster home</div>
            <div class="text-right text-dark pt-1">You can foster dogs.
                You must log in and agree to the Terms of Use in order to apply.
            </div>
        </div>
 </div>

   </div>

@endsection
