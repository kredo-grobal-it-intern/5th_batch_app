<!DOCTYPE html>
<html lang="ja">
<head>
  <title>Larave</title>
  <script src="https://js.stripe.com/v3/"></script>
  <link rel="stylesheet" href="/app.css">
  <script src="/app.js"></script>

</head>
<body>

</html>
      <form action="{{ route('card.stripe') }}" method="post"id="payment-form">
        @csrf
          {{-- input payment amount --}}
            <div class="mb-3">
                <div class="input-group">
                    <div class="input-group-text">$</div>
                    <input type="number" name="amount" id="amount" class="form-control" step="any">
                </div>
                @error('price')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>

                          <!-- Mount the instance within a <label> -->
            <label>Card
              <div id="card-element"></div>
            </label>

            <!--
              Or create a <label> with a 'for' attribute,
              referencing the ID of your container.
            -->
            <label for="card-element">Card</label>
            <div id="card-element"></div>

            <script>
              cardElement.mount('#card-element');
            </script>

                <!-- Used to display Element errors. -->
                <div id="card-errors" role="alert"></div>
              </div>

            <button id="checkout-button" type="submit" class="btn btn-success fw-bold px-5">submit</button>
        </form>
      </div>

    </body>
