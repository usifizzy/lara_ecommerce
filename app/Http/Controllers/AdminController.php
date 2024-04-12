<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
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
}
