<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $brand->name }} Products</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #000000;
            margin-bottom: 20px;
        }
        a {
            text-decoration: none;
            color: #333333;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #333333;
            color: #ffffff;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #e0e0e0;
        }
        td img {
            max-width: 100px;
            height: auto;
            border-radius: 4px;
        }
        .section {
            margin-top: 20px;
        }
        .btn-primary {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #333333;
            color: #ffffff;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
        }
        .btn-primary:hover {
            background-color: #555555;
        }
    </style>
</head>
<body>
    <h1>{{ $brand->name }} Products</h1>

    <a href="{{ route('admin.dashboard') }}" class="btn-primary">Back to Brands List</a>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>
                        @if ($product->image)
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                        @else
                            No image
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No products available for this brand.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="section">
        <h2>Manage Products</h2>
        <a href="{{ route('products.create') }}" class="btn-primary">Create New Product</a>
    </div>
</body>
</html>
