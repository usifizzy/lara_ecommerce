<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\View\View;

class StoreController extends Controller
{
    //

    public function index(): View
    {

        return view('app.store_view', [
            'products' => Product::paginate(9),
            'hasCart' => false,
            'isUserLoggedIn' => false
        ]);
    }

    public function single_product($id): View
    {
        return view('app.store_single_view', [
            'product' => Product::findOrFail($id),
            'hasCart' => false,
            'isUserLoggedIn' => false
        ]);
    }
}
