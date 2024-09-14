<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Basic styling for admin dashboard */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
            color: #333;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }
        .section {
            width: 100%;
            max-width: 800px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h1, h2 {
            color: #000000;
            margin-bottom: 20px;
            text-align: center;
        }
        a {
            display: inline-block;
            margin-bottom: 10px;
            text-decoration: none;
            color: #000000;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        table {
            width: 100%;
            border-collapse: collapse;
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
            background-color: #f1f1f1;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            color: #ffffff;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .btn-primary {
            background-color: #333333;
        }
        .btn-primary:hover {
            background-color: #000000;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            color: #ffffff;
            background-color: #333333;
        }
        button:hover {
            background-color: #000000;
        }
        .button-group {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #ffffff;
            margin-bottom: 10px;
        }
        .success-message {
            color: #27ae60;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>
    @if (Auth::check())
        <div class="container">
            <!-- Manage Payments -->
            <div class="section">
           
                <div class="button-group">
                    <a href="{{ route('admin.payments') }}" class="btn btn-primary">View All Payments</a>
                    <a href="{{ route('discount.generate') }}" class="btn btn-primary">Generate Discount Code</a>
                </div>
            </div>

            <!-- Manage Brands -->
            <div class="section">
                <h2>Manage Brands</h2>
                <a href="{{ route('brands.create') }}" class="btn btn-primary">Create New Brand</a>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td><a href="{{ route('brands.show', $brand->id) }}">{{ $brand->name }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px; text-align: center;">
            @csrf
            <button type="submit" class="btn btn-secondary">Logout</button>
        </form>
    @else
        <h2>Not Authorized</h2>
        <p>You do not have permission to view this page.</p>
    @endif

    <!-- Generate Discount Code Section -->
    <div class="container">
        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        @if(isset($discountCodes) && $discountCodes->count() > 0)
            <h2>Existing Discount Codes</h2>
            <ul>
                @foreach($discountCodes as $code)
                    <li>{{ $code->code }} - {{ $code->discount_percentage }}%</li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>
