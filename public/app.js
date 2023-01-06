// Set your publishable key: remember to change this to your live publishable key in production
// See your keys here: https://dashboard.stripe.com/apikeys
const stripe = Stripe('pk_test_51M8JNHK3NRhPPLZhdCTw0GAC3iNERi0b0wMeGtJD5iqZFQrUAAokm01N0QegTUlQYAyar4Rdd6B9vOQrzDTzB1Qi00LEsT5qoy');
const elements = stripe.elements();
// The items the customer wants to buy

// Custom styling can be passed to options when creating an Element.
const style = {
  base: {
    // Add your base input styles here. For example:
    fontSize: '16px',
    color: '#32325d',
  },
};

// Create an instance of the card Element.
const card = elements.create('card', {style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Create a token or display an error when the form is submitted.
const form = document.getElementById('payment-form');
form.addEventListener('submit', async (event) => {
  event.preventDefault();

//   const {token, error} = await stripe.createToken(card);
  stripe.createToken(card).then(function(result) {

  if (result.error) {
    // Inform the customer that there was an error.
    const errorElement = document.getElementById('card-errors');
    errorElement.textContent = result.error.message;
  } else {
    // Send the token to your server.
    stripeTokenHandler(result.token);
  }
 });
});


const stripeTokenHandler = (token) => {
  // Insert the token ID into the form so it gets submitted to the server
  const form = document.getElementById('payment-form');
  const hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}

