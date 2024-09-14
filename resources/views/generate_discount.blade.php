<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Discount Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        h1 {
            color: #000;
            margin-bottom: 20px;
        }
        h2 {
            color: #666;
            margin-top: 20px;
        }
        p {
            font-size: 16px;
        }
        form {
            margin-bottom: 20px;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            color: #fff;
            background-color: #333;
        }
        button:hover {
            background-color: #555;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #fff;
            margin-bottom: 10px;
        }
        .success-message {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Generate Discount Code</h1>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <form action="{{ route('discount.generate') }}" method="POST">
        @csrf
        <button type="submit">Generate Discount Code</button>
    </form>

    @if(isset($discountCodes) && $discountCodes->count() > 0)
        <h2>Existing Discount Codes</h2>
        <ul>
            @foreach($discountCodes as $code)
                <li>{{ $code->code }} - {{ $code->discount_percentage }}%</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
