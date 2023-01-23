@extends('layouts.app')

@section('title', 'Donate page')

@section('style')
     <link rel="stylesheet" href="{{ mix('/css/find.confirm.css') }}">
@endsection

@section('content')

    <div class="row mt-5">
        <div class="col-4">

        </div>

       <div class="col">

        <div class="title">
            Foster Parent Application and Inquiry Form
        </div>

        <div class="number_border">
        </div>
        <div class="circle_1">
          <div class="my-auto">1</div>
        </div>
        <div class="circle_title_1">Application</div>

        <div class="circle_2">
            <div class="mx-auto">2</div>
        </div>
        <div class="circle_title_2">Confimation</div>

        <div class="circle_3">
            <div class="my-auto">3</div>
        </div>
        <div class="circle_title_3">Complete</div>

            <div class="confirm_dog">
                <img src="{{ asset('/assets/images/donation.png') }}">
            </div>

                  {{-- input User information --}}
           <div class="u_form">
                <div class="row my-1">
                    <div class="col">Name</div>
                    <div class="col">Accont Name</div>
                </div>
                <div class="row my-1">
                    {{-- Name --}}
                    <div class="col h5">{{ $user->name }}</div>
                {{-- Account Name --}}
                    <div class="col h5">{{ $user->username }}</div>
                </div>

                <div class="row my-1">
                    <div class="col">Gender</div>
                    <div class="col">Date of Brith</div>
                </div>
                <div class="row my-1">
                    {{-- gender --}}
                    <div class="col h5">{{ $user->gender }}</div>
                {{-- birthdate --}}
                    <div class="col h5">{{ $user->birthdate}}</div>
                </div>

                <div class="row my-1">
                    <div class="col">Post Code</div>
                    <div class="col">Phone Number</div>
                </div>
                <div class="row my-1">
                        {{-- Post Code --}}
                        <div class="col h5">{{ $user->postcode}}</div>
                        {{-- Phone --}}
                        <div class="col h5">{{ $user->postcode}}</div>
                </div>

                <div class="row my-1">
                    <div class="col">Address</div>
                    <div class="col">City/Street Adress</div>
                </div>
                <div class="row my-1">
                <div class="col h5">{{ $user->address}}</div>
                        {{-- City/Street Adress --}}
                <div class="col h5">{{ $user->street_address}}</div>
                </div>

                <div class="row my-1">
                    <div class="col">Apartment/Building Name</div>
                    <div class="col">Prefecture</div>
                </div>

                <div class="row my-1">
                <div class="col h5">{{ $user->room_num}}</div>
                <div class="col h5">{{ $user->prefecture}}</div>
                </div>

                <br>
              {{-- Complete Publication --}}
            <button  type="submit" class="confirm_button" ><a href="{{ route('find_animal.completed') }}" class="link-dark">Conmplete</a></button>
            </form>
           </div>

         @endsection
