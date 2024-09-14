<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://js.stripe.com/v3/"></script>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 800px;
        }
        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .cart-header h1 {
            color: #007BFF;
            margin-bottom: 20px;
        }
        .view-cart-btn {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
        }
        .view-cart-btn:hover {
            background-color: #0056b3;
        }
        .message {
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
        }
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
        }
        .discount-info {
            margin-bottom: 20px;
            color: #155724;
        }
        .cart-list {
            list-style-type: none;
            padding: 0;
        }
        .cart-item {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .cart-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 20px;
        }
        .cart-item-info {
            flex: 1;
        }
        .cart-item-info p {
            margin: 0;
        }
        .cart-total {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
        .form-container {
            margin-top: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            margin-top: 0;
            color: #007BFF;
            margin-bottom: 20px;
        }
        .form-container label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-container input {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 10px;
            width: calc(100% - 22px);
        }
        .form-container #card-element {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        .form-container button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
        #map {
            width: 100%;
            height: 400px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="cart-header">
            <h1>Shopping Cart</h1>
            <a href="{{ route('products.index') }}" class="view-cart-btn">View Products</a>
        </div>

        @if (session('success'))
            <p class="message success-message">{{ session('success') }}</p>
        @endif

        @if (session('error'))
            <p class="message error-message">{{ session('error') }}</p>
        @endif

        @if (session('discount_code'))
            <p class="discount-info">Discount Code: {{ session('discount_code') }}</p>
            <p class="discount-info">Discount Percentage: {{ session('discount_percentage') }}%</p>
            <p class="discount-info">Discounted Total: ${{ number_format(session('discounted_total'), 2) }}</p>
        @endif

        @if ($cart && $cart->items->count() > 0)
            <ul class="cart-list">
                @foreach ($cart->items as $item)
                    <li class="cart-item">
                        <img src="{{ Storage::url($item->image) }}" alt="{{ $item->product->name }}">
                        <div class="cart-item-info">
                            <p><strong>Name:</strong> {{ $item->product->name }}</p>
                            <p><strong>Quantity:</strong> {{ $item->quantity }}</p>
                            <p><strong>Price:</strong> ${{ number_format($item->product->price * $item->quantity, 2) }}</p>
                        </div>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Remove</button>
                        </form>
                    </li>
                @endforeach
            </ul>

            <div class="cart-total">
                <p>Total: ${{ number_format($cart->items->sum(fn($item) => $item->product->price * $item->quantity), 2) }}</p>
            </div>

            <div class="form-container">
                <h2>Payment Details</h2>
                <form id="payment-form" action="{{ route('process.payment') }}" method="POST">
                    @csrf
                    <label for="cardholderName">Cardholder's Name</label>
                    <input type="text" id="cardholderName" name="cardholderName" required>

                    <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display form errors. -->
                    <div id="card-errors" role="alert"></div>

                    <input type="text" id="loc" name="loc" placeholder="Street Name" required readonly>
                    <input type="hidden" name="cart_id" value="{{ $cart->id }}">      
                    <input type="number" name="total" value="{{ $cart->items->sum(fn($item) => $item->product->price * $item->quantity) }}" step="0.01" hidden>
                    
                    <button type="submit">Submit Payment</button>
                </form>
            </div>
        @else
            <p>Your cart is empty.</p>
        @endif

        <div id="map"></div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKCK7ObKSfI445t8A4dxaVcT3YiE8DsPI&callback=initMap" async defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var stripe = Stripe('pk_test_51Pfmi5RxWNkAKYkHGlsrNNyYBjBkkLX1hpmHg2HRJERkeu87mJKjhrgbGYcT0zjOHotmEjaI6RDvtC9HU1KhpZ5I00M11rC5of'); // Replace with your public key
            var elements = stripe.elements();

            var card = elements.create('card');
            card.mount('#card-element');

            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        var hiddenInput = document.createElement('input');
                        hiddenInput.setAttribute('type', 'hidden');
                        hiddenInput.setAttribute('name', 'stripeToken');
                        hiddenInput.setAttribute('value', result.token.id);
                        form.appendChild(hiddenInput);

                        form.submit();
                    }
                });
            });
        });

        let map, locationInput, marker;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 28.626137, lng: 79.821603 },
                zoom: 15
            });

            marker = new google.maps.Marker({
                map: map,
                position: { lat: 28.626137, lng: 79.821603 },
                title: "Click to select location",
                icon: 'https://maps.google.com/mapfiles/ms/icons/red-dot.png' // Red marker icon
            });

            const geocoder = new google.maps.Geocoder();

            map.addListener("click", function(event) {
                const latLng = event.latLng;

                geocoder.geocode({ location: latLng }, (results, status) => {
                    if (status === 'OK' && results[0]) {
                        const address = results[0].formatted_address;
                        locationInput.value = address;
                        marker.setPosition(latLng);
                        marker.setTitle(address);
                    } else {
                        console.error('Geocoder failed due to: ' + status);
                    }
                });
            });
        }

        window.onload = function() {
            locationInput = document.getElementById('loc');
            initMap();
        };
    </script>
</body>
</html>
