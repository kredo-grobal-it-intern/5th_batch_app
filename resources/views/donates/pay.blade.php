@extends('layouts.app')

@section('title', 'Donate page')

@section('content')

    <div class="justify-content-center my-5">
            <img src="{{ asset('/storage/images/cat4.jpg') }}" class="rounded mx-auto d-block pt-1" width="180" height="180" style="border-radius: 30px" style="border: 6px solid #FFFFFF">
      <form action="{{ route('card.pay_price') }}" method="post" id="payment-form">
        @csrf
        <div class="form-row">
            <label for="card-element">クレジットカード情報</label>
            <div id="card-element">
                <!-- ここにクレジットカード情報入力欄が挿入される -->
            </div>

               <!-- ここにエラーメッセージが表示される -->
        <div id="card-errors" role="alert"></div>
        </div>

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
        </form>
      </div>


@endsection
