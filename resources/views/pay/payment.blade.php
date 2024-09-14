<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <form id="payment-form" action="{{ route('process.payment') }}" method="POST">
        @csrf
        <label for="cardholderName">Cardholder's Name</label>
        <input type="text" id="cardholderName" name="cardholderName" required><br>

        <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
        </div>

        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div><br>

        <button type="submit">Submit Payment</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Stripe.js with your publishable key
            var stripe = Stripe('pk_test_51Pfmi5RxWNkAKYkHGlsrNNyYBjBkkLX1hpmHg2HRJERkeu87mJKjhrgbGYcT0zjOHotmEjaI6RDvtC9HU1KhpZ5I00M11rC5of'); // Replace with your public key
            var elements = stripe.elements();

            // Create an instance of the card Element
            var card = elements.create('card');
            card.mount('#card-element');

            // Handle form submission
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Display error.message in your UI.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Insert the token ID into the form so it gets submitted to the server
                        var hiddenInput = document.createElement('input');
                        hiddenInput.setAttribute('type', 'hidden');
                        hiddenInput.setAttribute('name', 'stripeToken');
                        hiddenInput.setAttribute('value', result.token.id);
                        form.appendChild(hiddenInput);

                        // Submit the form
                        form.submit();
                    }
                });
            });
        });
    </script>
</body>
</html>
