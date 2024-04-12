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



        /* Styles for pagination container */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        /* Styles for pagination links */
        .pagination a {
            padding: 8px 16px;
            margin: 0 4px;
            color: #007bff; /* Link color */
            text-decoration: none;
            border: 1px solid #007bff; /* Border color */
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        /* Hover effect for pagination links */
        .pagination a:hover {
            background-color: #007bff;
            color: #fff; /* Text color on hover */
        }

        /* Active page style */
        .pagination .active {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="/admin">Dashboard</a></li>
            <li><a href="/admin/products">Products</a></li>
            <li><a href="/admin/orders">Orders</a></li>
            <li>Customers</li>
            <li><a href="/auth/signout">Sign Out</a></li>
            <br>
            <br>
            <li><a href="/">Store</a></li>
        </ul>
    </div>

    <div class="content">
        
    <h2>Customer List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <!-- <th>Status</th> -->
                <!-- <th> </th> -->
            </tr>
        </thead>
        <tbody>
        @foreach ($customers as $single_customer) 
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$single_customer->name}}/td>
                <td>{{$single_customer->email}}</td>
                <td>{{$single_customer->phone}}</td>
            </tr>
        @endforeach    
        </tbody>
    </table>
    <div class="pagination"> $pagination </div>
    </div>
</body>
</html>
