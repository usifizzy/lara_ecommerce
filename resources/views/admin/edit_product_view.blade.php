<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
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
        .sidebar ul li{
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
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 0 auto;
        }
        input[type="text"], input[type="number"], input[type="file"], textarea, select, input[type="submit"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
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
            <li><a href="/admin/orders">Orders</a></li>
            <li><a href="/admin/customers">Customers</a></li>
            <li><a href="/auth/signout">Sign Out</a></li>
            <br>
            <br>
            <li><a href="/store">Store</a></li>
        </ul>
    </div>

    <div class="content">

    <form action="/admin/products/update/{{$edit_products_list->id}}"  method="post" enctype="multipart/form-data">
        @csrf
        <h2>Create Product</h2>
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{$edit_products_list->name}}" required>
        
        <label for="price">Price:</label>
        <input type="number" name="price" min="0" step="0.01" value="{{$edit_products_list->price}}" required>
        
        <label for="category">Category:</label>
        <input type="text" name="category" accept="image/*"  value="{{$edit_products_list->category}}" required disabled>
    
        
        <label for="description">Description:</label>
        <textarea name="description" rows="4" required>{{$edit_products_list->description}}</textarea>
        
        <label for="image">Change Image:</label>
        <input type="file" name="image" accept="image/*"  value="{{$edit_products_list->image}}">
        <img src="{{asset($edit_products_list->image)}}" alt="{{$edit_products_list->name}}" class="product-image" style="width:250px;height:250px">
        
        <input type="submit" value="Update Product">
    </form>
    </div>
</body>
</html>


