<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\View\View;

class AdminController extends Controller
{
    //

    public function products(): View
    {
        return view('admin.products_view', [
            'products' => Product::paginate(10),
        ]);
    }

    public function customers(): View
    {
        return view('admin.customers_view', [
            'customers' => User::where('role', 'User')->get(),
        ]);
    }

    public function orders(): View
    {
        return view('admin.orders_view', [
            // 'all_orders' => Order::all(),
            'all_orders' => Order::paginate(10),
        ]);
    }

    public function order_details($order_id): View
    {
        return view('admin.order_details_view', [
            'orders_products_list' => OrderDetail::where('order_id', $order_id)->get(),
            'order' => Order::findOrFail($order_id)->order_no
        ]);
    }
}
