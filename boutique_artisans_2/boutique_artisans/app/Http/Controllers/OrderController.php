<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
            $userId = User::all()->first()->id;


            $order = Order::create([
                'user_id' => $userId,
                'total' => $request->input('total'),
            ]);

            foreach ($request->input('products') as $product) {
                $order->products()->attach(
                    $product['id'],
                    ['quantity' => $product['quantity'],
                    ]
                );
//                Product::find($product['id'])->decrement('stock', $product['quantity']);
            }
            $order->save();
            return response()->json($order, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function attachProductToOrderToUser(Request $request)
    {
        $user = User::all()->first();
        $userId = $user->id;

        $productId = $request->input('product_id');
        $product = Product::find($product_id);

        // Create Order
        // Attach product id qui vient de la request à cet order
        // Attache cet order a mon user
        // fin
    }
}
