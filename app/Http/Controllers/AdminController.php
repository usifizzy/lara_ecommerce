<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

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
            'customers' => User::where('role', 'User')->paginate(10),
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


    public function new_product(Request $request)
    {
            // var_dump($request->all());
       
        $validator = Validator::make($request->all(), [
            'description' => 'required|max:5000|min:2',
            'category' => 'required|max:64|min:8',
            'name' => 'required|max:64|min:2',
            'price' => 'required|numeric|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:90480',
        ]);
            // var_dump($validator);
            var_dump($validator->validated());
        
        // if ($validator->fails()) {
        //     // // Validation failed, handle errors
        //     return redirect()->back()->withErrors($validator)->withInput(); 
        // }
        
        // Validation passed, retrieve validated data
        $validated = $validator->validated();


        try {


            // Store the uploaded image
            $imageData = time().'.'.$request->image->extension();
            $doUpload = $request->image->move(public_path('images'), $imageData);

            var_dump($doUpload);

            // Optionally, you can store the image path in the database
    
            $newProduct = Product::create(
                [
                    'name' => $validated['name'], 
                    'price' => $validated['price'], 
                    'category' => $validated['category'], 
                    'description' => $validated['description'], 
                    'image' => $imageData
                ]
            );

            return redirect('admin/products');
        } catch (\Throwable $th) {
            throw $th;

            $data['error_msg'] = 'Error adding product';
            return redirect->back()
                        ->withErrors($data)
                        ->withInput();
        }
    }
}
