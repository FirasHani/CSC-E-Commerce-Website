<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}

header {
    background-color: #333;
    color: #fff;
    padding: 15px;
    text-align: center;
    position: relative;
}

.header-actions {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 10px;
}

.header-actions .view-cart-btn, .header-actions .logout-btn {
    color: #fff;
    background-color: #007bff;
    border: none;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
}

.header-actions .logout-btn {
    background-color: #dc3545;
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: 20px auto;
}

.search-bar-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.search-bar {
    width: 80%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.filter-container {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.filter-group {
    flex: 1;
    margin-right: 20px;
}

.filter-group label {
    display: block;
    margin-bottom: 5px;
}

.filter-group input[type="range"] {
    width: 100%;
}

.price-range-output {
    display: block;
    text-align: right;
    margin-top: 5px;
}

.brand-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.brand-item {
    cursor: pointer;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.brand-item:hover {
    background-color: #f0f0f0;
}

.product-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.product-card {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 15px;
    width: calc(33.333% - 20px);
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    text-align: center;
    transition: transform 0.3s;
}

.product-card:hover {
    transform: scale(1.05);
}

.product-image {
    max-width: 100%;
    height: auto;
    border-bottom: 1px solid #ddd;
    margin-bottom: 10px;
}

.no-image {
    background-color: #f0f0f0;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.product-name {
    margin: 10px 0;
    font-size: 1.2em;
}

.product-price {
    font-size: 1.1em;
    color: #333;
}

.btn {

}


/* Existing styles... */

.brand-list {
    list-style: none;
    padding: 0;
}

.brand-item {
    cursor: pointer;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: background-color 0.3s, color 0.3s;
    margin-bottom: 5px;
}

.brand-item:hover {
    background-color: #007bff;
    color: #fff;
}

.selected-brand {
    margin-top: 15px;
    font-size: 1.2em;
    color: #333;
}
.modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 500px;
    }
    .input-field {
        margin-bottom: 15px;
    }
    .input-field label {
        display: block;
        margin-bottom: 5px;
    }
    .input-field input {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
    }
    .btn {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
    }
    .cart-icon {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #007bff;
    color: white;
    padding: 10px;
    border-radius: 50%;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    z-index: 1000;
}

/* Popup Window */
.cart-popup {
    display: none;
    position: fixed;
    bottom: 60px;
    right: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    width: 300px;
    max-width: 100%;
    border-radius: 5px;
    z-index: 1000;
}

.cart-popup-content {
    padding: 20px;
}
/* Sticky Cart Icon */
.cart-icon {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #007bff;
    color: white;
    padding: 10px;
    border-radius: 50%;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    z-index: 1000;
    font-size: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Popup Window */
.cart-popup {
    display: none;
    position: fixed;
    bottom: 60px;
    right: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    width: 350px;
    max-width: 90%;
    border-radius: 5px;
    z-index: 1000;
    overflow: hidden;
}

.cart-popup-content {
    padding: 20px;
    max-height: 400px;
    overflow-y: auto;
}

.cart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.cart-header h1 {
    font-size: 18px;
    margin: 0;
}

.view-cart-btn {
    background-color: #007bff;
    color: white;
    padding: 5px 10px;
    border-radius: 3px;
    text-decoration: none;
    font-size: 14px;
}

.message {
    margin: 10px 0;
    padding: 10px;
    border-radius: 3px;
}

.success-message {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.error-message {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.discount-info {
    margin: 5px 0;
    font-size: 14px;
    color: #28a745;
}

.cart-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.cart-item {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
}

.cart-item img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    margin-right: 10px;
    border-radius: 5px;
}

.cart-item-info p {
    margin: 2px 0;
    font-size: 14px;
}

.cart-item-info strong {
    font-weight: bold;
}

.cart-item form button {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
    font-size: 14px;
}

.cart-total {
    font-size: 16px;
    font-weight: bold;
    margin-top: 10px;
}

.form-container {
    margin-top: 10px;
}

.form-container form {
    display: flex;
    flex-direction: column;
}

.form-container label {
    font-size: 14px;
    margin-bottom: 5px;
}

.form-container input {
    padding: 5px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 3px;
}

.form-container button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
    font-size: 14px;
}
.brand-select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
    background-color: #fff;
    cursor: pointer;
}

.selected-brand {
    margin-top: 10px;
    font-weight: bold;
}

    </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <!-- Bootstrap CSS -->
  <link href="{{ asset('resources/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="{{ asset('resources/css/tiny-slider.css') }}" rel="stylesheet">
  <link href="{{ asset('resources/css/style.css') }}" rel="stylesheet">
  @vite(['resources/css/style.css', 'resources/js/app.js','resources\css\bootstrap.min.css'])
  <title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>
</head>
	<body>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.html">Furni<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item ">
							<a class="nav-link" href="/home">Home</a>
						</li>
						<li class="active"><a class="nav-link" href="shop.html">Shop</a></li>
						<li><a class="nav-link" href="about.html">About us</a></li>
						<li><a class="nav-link" href="services.html">Services</a></li>
						<li><a class="nav-link" href="blog.html">Blog</a></li>
						<li><a class="nav-link" href="contact.html">Contact us</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="#"><img src="images/user.svg"></a></li>
						<li><a class="nav-link" href="/cart">cart<img src="/cart"></a>cart</li>
					</ul>
				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Shop</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<!-- Modal Structure -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
        <h4>Login</h4>
        <form action="{{ route('login-store') }}" method="POST">
            @csrf
            <div class="input-field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</div>
<!-- Sticky Cart Icon -->
<div class="cart-icon" id="cartIcon">
    <i class="fas fa-shopping-cart"></i>
</div>

<!-- Popup Window -->
<div class="cart-popup" id="cartPopup">
    <div class="cart-popup-content">
        <h4>Cart</h4>
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
                
                @php
                    $total = $cart->items->sum(fn($item) => $item->product->price * $item->quantity);
                    $discount = 0;
                    if ($cart->discountCode) {
                        $discount = ($total * $cart->discountCode->discount_percentage) / 100;
                        $total -= $discount;
                    }
                @endphp

                <div class="cart-total">
                    <p>Total: ${{ number_format($total, 2) }}</p>
                    @if ($discount > 0)
                        <p>Discount: -${{ number_format($discount, 2) }}</p>
                    @endif
                </div>

                <div class="form-container">
                    <form action="/apply-discount" method="POST">
                        @csrf
                        <label for="discount_code">Enter Discount Code:</label>
                        <input type="text" id="discount_code" name="discount_code" required>
                        <button type="submit">Apply Discount</button>
                    </form>
                </div>
            @else
                <p>Your cart is empty.</p>
            @endif
        </div>
    </div>
</div>
        @if (session('success'))
        <div class="alert success-message">{{ session('success') }}</div>
    @endif

    <div class="container">
        <div class="search-bar-container">
            <input type="text" class="search-bar" placeholder="Search products..." id="searchBar" oninput="searchProducts()">
        </div>

        <div class="filter-container">
            <div class="filter-group">
                <label for="priceRange">Max Price:</label>
                <input type="range" id="priceRange" min="0" max="1000" value="1000" oninput="filterByPrice(this.value)">
                <span class="price-range-output" id="priceRangeOutput">$1000</span>
            </div>
            <div class="filter-group">
    <h4>Brands</h4>
    <select id="brand-select" class="brand-select" onchange="filterByBrand(this.value)">
        <option value="">Select a brand</option>
        @foreach ($brands as $brand)
            <option value="{{ $brand->name }}">{{ $brand->name }}</option>
        @endforeach
    </select>
    <p id="selectedBrand" class="selected-brand"></p>
</div>
        </div>

        <div class="product-grid" id="product-list">
        @foreach ($products as $product)
    <div class="product-card" data-brand="{{ $product->brand->name }}" data-price="{{ $product->price }}">
        @if ($product->image)
            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="product-image">
        @else
            <div class="no-image">No image</div>
        @endif
        <h3 class="product-name">{{ $product->name }}</h3>
        <p class="product-price">${{ number_format($product->price, 2) }}</p>
        <form action="{{ route('cart.add', $product->id) }}" method="POST" onsubmit="handleAddToCart(event)">
            @csrf
            <label for="quantity-{{ $product->id }}">Quantity:</label>
            <input type="number" id="quantity-{{ $product->id }}" name="quantity" value="1" min="1" required>
            <button type="submit" class="btn btn-add-to-cart">Add to Cart</button>
        </form>
    </div>
@endforeach
        </div>
    </div>

    <script>

function filterByBrand(selectedBrand) {
    document.getElementById('selectedBrand').textContent = selectedBrand ? `Selected Brand: ${selectedBrand}` : '';
    // Add logic here to filter items based on the selected brand
}


 document.getElementById('cartIcon').addEventListener('click', function() {
    var cartPopup = document.getElementById('cartPopup');
    if (cartPopup.style.display === 'none' || cartPopup.style.display === '') {
        cartPopup.style.display = 'block';
    } else {
        cartPopup.style.display = 'none';
    }
});

// Optional: Close the popup when clicking outside of it
window.onclick = function(event) {
    var cartPopup = document.getElementById('cartPopup');
    var cartIcon = document.getElementById('cartIcon');
    if (event.target !== cartPopup && event.target !== cartIcon && !cartPopup.contains(event.target)) {
        cartPopup.style.display = 'none';
    }
}


        function searchProducts() {
            const query = document.getElementById('searchBar').value.toLowerCase();
            const products = document.querySelectorAll('.product-card');
            products.forEach(product => {
                const name = product.querySelector('.product-name').textContent.toLowerCase();
                product.style.display = name.includes(query) ? 'block' : 'none';
            });
        }

        function filterByPrice(maxPrice) {
            document.getElementById('priceRangeOutput').textContent = `$${maxPrice}`;
            const products = document.querySelectorAll('.product-card');
            products.forEach(product => {
                const price = parseFloat(product.dataset.price);
                product.style.display = price <= parseFloat(maxPrice) ? 'block' : 'none';
            });
        }

        function filterByBrand(brand) {
            document.getElementById('selectedBrand').textContent = `Selected Brand: ${brand}`;
            const products = document.querySelectorAll('.product-card');
            products.forEach(product => {
                product.style.display = product.dataset.brand === brand || brand === '' ? 'block' : 'none';
            });
        }
    </script>

<!-- Logout Form -->
<!-- <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
    @csrf
    <button type="submit" class="logout-btn">Logout</button>
</form> -->

<!-- JavaScript Functions -->
<script>
        document.addEventListener('DOMContentLoaded', function () {
        @if (!Auth::check())
            document.getElementById('loginModal').style.display = 'block';
        @endif
    });

    // Optional: Close the modal when the user clicks outside of it
    window.onclick = function(event) {
        const modal = document.getElementById('loginModal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    function searchProducts() {
        const query = document.getElementById('searchBar').value.toLowerCase();
        const products = document.querySelectorAll('.product-card');
        products.forEach(product => {
            const name = product.querySelector('h3').textContent.toLowerCase();
            if (name.includes(query)) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    }

    function filterByBrand(brand) {
            const products = document.querySelectorAll('.product-card');
            products.forEach(product => {
                if (product.dataset.brand === brand || brand === '') {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        }
    function filterByBrand(brand) {
        const products = document.querySelectorAll('.product-card');
        products.forEach(product => {
            if (product.dataset.brand === brand || brand === '') {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    }
</script>


					<!-- End Column 2 -->


		      	</div>
		    </div>
		</div>


		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">
				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Enter your email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
						<p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">About us</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Support</a></li>
									<li><a href="#">Knowledge base</a></li>
									<li><a href="#">Live chat</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Our team</a></li>
									<li><a href="#">Leadership</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Nordic Chair</a></li>
									<li><a href="#">Kruzo Aero</a></li>
									<li><a href="#">Ergonomic Chair</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a>  Distributed By <a href="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
