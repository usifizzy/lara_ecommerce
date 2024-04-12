<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function checkout() 
    {
        $user = Auth::user();
        $cart = session('cart', []);
        if (count($cart) <= 0) {
            session()->forget('cart');
            return redirect()->action([StoreController::class, 'index']);
        }

        return view('app.checkout_view', [
            'cart_contents' => session('cart', []),
            'userDetails' => User::findOrFail($user->id),
            'message' => '',
            'status' => false
        ]);
        
    }

    public function place_order() : View 
    {

        $user = Auth::user();
        $status = false;
        $message = '';
        $cart_contents = session('cart', []);

        $totalAmount = 0;

        try {
            foreach ($cart_contents as $item) {
                $totalAmount += $item['price'] * $item['quantity'];
            }
            
    
            $orderId = Order::create(['order_no' => Str::random(15), 'amount' => $totalAmount, 'customer_id' => $user->id])->id;
            foreach ($cart_contents as $cart_items){
                OrderDetail::create([
                    'order_id' => $orderId, 
                    'product_name' => $cart_items['name'], 
                    'price' => $cart_items['price'], 
                    'quantity' => $cart_items['quantity'], 
                    'amount' => $cart_items['price'] * $cart_items['quantity'], 
                    'product_id' => $cart_items['product_id'],
                ]);
            }
            $message = 'Order created successfully. Thank you';
            $status = true;
            session()->forget('cart');
        } catch (\Throwable $th) {

            throw $th;
            $message = 'Unable to place order. Please try later';
        } 



        return view('app.checkout_view', [
            'cart_contents' => $cart_contents,
            'userDetails' => User::findOrFail($user->id),
            'message' => $message,
            'status' => $status
        ]);
    }
}
