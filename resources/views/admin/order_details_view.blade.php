<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #333;
            padding-top: 20px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px 20px;
            color: #fff;
            cursor: pointer;
        }
        .sidebar ul li:hover {
            background-color: #555;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        a{
            color: #ffff; 
            text-decoration: none;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul>
            <li>Hi, {{ auth()->user()->name }}</li>
            <br>
            <br>
            <li><a href="/admin">Dashboard</a></li>
            <li><a href="/admin/products">Products</a></li>
            <li>Orders</li>
            <li><a href="/admin/customers">Customers</a></li>
            <li><a href="/auth/signout">Sign Out</a></li>
            <br>
            <br>
            <li><a href="/store">Store</a></li>
        </ul>
    </div>

    <div class="content">
        
    <h2>Order: {{$order}}</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Price(£)</th>
                <th>Quantity</th>
                <th>Amount(£)</th>
            </tr>
        </thead>
        <tbody>
        @php 
            $count = 1;
            $total = 0;
        @endphp
        @foreach ($orders_products_list as $single_products) 
            @php($total += ($single_products->price * $single_products->quantity))
        
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$single_products->product_name}}</td>
                <td>{{number_format($single_products->price, 2)}}</td>
                <td>{{number_format($single_products->quantity)}}</td>
                <td>{{number_format($single_products->price * $single_products->quantity, 2)}}</td>
            </tr>
            @endforeach

            <tr>
                <th> </th>
                <th> </th>
                <th> </th>
                <th> </th>
                <th>£ {{number_format($total, 2)}}</th>
            </tr>
        </tbody>
    </table>
    </div>
</body>
</html>
