@extends('layouts.app')

@section('title', 'Donate page')

@section('style')
     <link rel="stylesheet" href="{{ mix('/css/stripe_form.css') }}">
@endsection


@section('content')
        <div class="row mt-5">
            <div class="col">
                <img src="{{ asset('/storage/images/donation.png') }}">
            </div>
            <div class="col mt-2">
                <form action="{{ route('card.pay_price') }}" method="POST"id="payment-form">
                    @csrf
                      {{-- input payment amount --}}
                        <div class="mb-3">
                            <label for="card-element">Please enter the money you wish to donate</label>
                            <div class="input-group">
                                <div class="input-group-text">$</div>
                                <input type="number" name="amount" id="amount" class="form-control" step="any">
                            </div>
                            @error('price')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>

                        <!--
                          Or create a <label> with a 'for' attribute,
                          referencing the ID of your container.
                        -->
                        <label for="card-element">Card</label>
                        <div id="card-element"></div>

                            <!-- Used to display Element errors. -->
                            <div id="card-errors" role="alert"></div>

                     <button id="checkout-button" type="submit" class="btn fw-bold" style=" height: 40px;background:#FACA7B;;border-radius: 12px;">submit</button>
                    </form>
            </div>
        </div>
    </body>
    @endsection
    @section('script')
        <script src="https://js.stripe.com/v3/"></script>
        <script src="{{ mix('js/stripe.form.js') }}"></script>
    @endsection

