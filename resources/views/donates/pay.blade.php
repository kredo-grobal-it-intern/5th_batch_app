@extends('layouts.app')

@section('title', 'Donate page')

@section('content')

    {{-- #postでデータを送信 --}}
    <div class="justify-content-center my-5">
            <img src="{{ asset('/storage/images/cat4.jpg') }}" class="rounded mx-auto d-block pt-1" width="180" height="180" style="border-radius: 30px" style="border: 6px solid #FFFFFF">
      <form action="{{ route('card.pay_price') }}" method="post">
        @csrf

            <div class="mb-3">
                <div class="input-group">
                    <div class="input-group-text">$</div>
                    <input type="number" name="amount" id="amount" class="form-control" step="any">
                </div>
                @error('price')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <button id="checkout-button" type="submit" class="btn btn-success fw-bold px-5">submit</button>
            <a href="{{ route('card.checkout') }}">Please check</a>
        </form>
      </div>

@endsection
