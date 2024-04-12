<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    public function show_cart(): View
    {
        return view('app.cart_view', [
            'cart_contents' => session('cart', [])
        ]);
    }

    public function add_item(Request $request): RedirectResponse
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $product = Product::findOrFail($productId);
        $name = $product->name;
        $price = $product->price;
        $image = $product->image;

        $cart = session('cart', []);


        // Add the item to the cart
        if (isset($cart[$productId])) {
            // If the product already exists in the cart, update the quantity
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // If the product is not in the cart, add it
            $cart[$productId] = [
                'product_id' => $productId,
                'name' => $name,
                'quantity' => $quantity,
                'price' => $price,
                'image' => $image
            ];
        }

        session(['cart' => $cart]);
        // return redirect()->route('cart.show');

        return redirect()->action([CartController::class, 'show_cart']);

    }

    public function update_item(Request $request): RedirectResponse
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $cart = session('cart', []);

        // Update quantity
        $cart[$productId] = $quantity;

        session(['cart' => $cart]);

        return redirect()->action([CartController::class, 'show_cart']);
    }

    public function remove_item($productId): RedirectResponse
    {
        $cart = session('cart', []);

        // Remove item from cart
        unset($cart[$productId]);

        session(['cart' => $cart]);

        return redirect()->action([CartController::class, 'show_cart']);
    }

    public function place_order() : View {
        
    }
}
