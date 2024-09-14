<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include your CSS file here -->
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
    max-width: 500px; /* Reduced max-width */
    box-sizing: border-box;
    overflow: hidden; /* Prevents overflow */
}

h1 {
    color: #007BFF;
    margin-bottom: 20px;
    text-align: center;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    color: #fff;
    background-color: #007BFF;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #0056b3;
}

.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
    background-color: #f8d7da;
    color: #721c24;
}

.register-link {
    text-align: center;
    margin-top: 20px;
}

.register-link a {
    color: #007BFF;
    text-decoration: none;
}

.register-link a:hover {
    text-decoration: underline;
}

#map {
    width: 100%;
    height: 300px; /* Adjust height */
    margin-bottom: 20px;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .container {
        padding: 15px;
    }
    #map {
        height: 250px; /* Adjust height for smaller screens */
    }
}

@media (max-width: 480px) {
    .container {
        padding: 10px;
        max-width: 100%;
    }
    #map {
        height: 200px; /* Adjust height for mobile screens */
    }
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Register</h1>

        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/register-store" method="POST" id="registration-form">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <div class="form-group">
                <label for="loc">Location:</label>
                <input id="loc" type="text" class="form-control" name="loc" value="{{ old('loc') }}" readonly>
            </div>

            <div id="map"></div>

            <button type="submit" class="btn">Register</button>
        </form>

        <div class="register-link">
            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>

    <script>
        let map, locationInput, marker, geocoder;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 28.626137, lng: 79.821603 },
                zoom: 15
            });

            locationInput = document.getElementById('loc');
            geocoder = new google.maps.Geocoder();

            map.addListener("click", function(event) {
                const latLng = event.latLng;
                locationInput.value = '';

                // Remove existing marker if any
                if (marker) {
                    marker.setMap(null);
                }

                // Add new marker with custom red icon
                marker = new google.maps.Marker({
                    position: latLng,
                    map: map,
                    icon: 'https://maps.google.com/mapfiles/ms/icons/red-dot.png' // Red icon URL
                });

                // Reverse geocode the coordinates
                geocodeLatLng(latLng);
            });
        }

        function geocodeLatLng(latLng) {
            geocoder.geocode({ location: latLng }, function(results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        locationInput.value = results[0].formatted_address;
                    } else {
                        locationInput.value = 'No results found';
                    }
                } else {
                    locationInput.value = 'Geocoder failed due to: ' + status;
                }
            });
        }

        function loadGoogleMapsAPI() {
            const script = document.createElement('script');
            script.src = `https://maps.googleapis.com/maps/api/js?key=AIzaSyDKCK7ObKSfI445t8A4dxaVcT3YiE8DsPI&callback=initMap`;
            script.async = true;
            script.defer = true;
            document.head.appendChild(script);
        }

        window.onload = loadGoogleMapsAPI;
    </script>
</body>
</html>
