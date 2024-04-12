<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\View\View;

class AdminController extends Controller
{
    //

    public function products(): View
    {
        return view('admin.products_view', [
            'products' => Product::all(),
            'hasCart' => false,
            'isUserLoggedIn' => false
        ]);
    }

    public function customers(): View
    {
        return view('admin.customers_view', [
            'customers' => User::where('role', 'User')->get(),
            'hasCart' => false,
            'isUserLoggedIn' => false
        ]);
    }

    public function orders(): View
    {
        return view('admin.orders_view', [
            'all_orders' => Order::all(),
            'hasCart' => false,
            'isUserLoggedIn' => false
        ]);
    }

    public function order_details($order_id): View
    {
        return view('admin.order_details_view', [
            'orders_products_list' => OrderDetail::where('order_id', $order_id)->get(),
            'hasCart' => false,
            'isUserLoggedIn' => false
        ]);
    }
}
