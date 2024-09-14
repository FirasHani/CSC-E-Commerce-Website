<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            color: #333;
        }
        h1 {
            color: #000000;
            margin-bottom: 20px;
            text-align: center;
        }
        form {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin: auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333333;
        }
        input[type="text"],
        input[type="number"],
        textarea,
        select,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        button {
            background-color: #333333;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            display: block;
            width: 100%;
            text-align: center;
        }
        button:hover {
            background-color: #555555;
        }
        .error-list {
            background-color: #f5c6cb;
            border: 1px solid #f1b0b7;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .error-list ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .error-list li {
            color: #721c24;
        }
    </style>
</head>
<body>
    <h1>Create Product</h1>

    @if ($errors->any())
        <div class="error-list">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="brand">Brand:</label>
        <select id="brand" name="brand_id" required>
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" required>

        <label for="image">Product Image:</label>
        <input type="file" id="image" name="image">

        <button type="submit">Create Product</button>
    </form>
</body>
</html>
