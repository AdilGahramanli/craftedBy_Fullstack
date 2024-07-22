<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
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
        $user = Auth::user();

        $order = Order::create([
            'date' => now(),
            'total' => $request->input('total'),
        ]);

        $order->users()->attach($user->id);

        foreach ($request->input('products') as $productData) {
            $order->products()->attach(
                $productData['id'],
                [
                    'quantity' => $productData['quantity'],
                    'color' => $productData['color'] ?? null,
                    'size' => $productData['size'] ?? null,
                ]
            );
            Product::find($productData['id'])->decrement('stock', $productData['quantity']);
        }

        return response()->json($order, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return response()->json($order);
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
        $order->update($request->all());
        return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(null, 204);
    }

    public function attachProductToOrderToUser(Request $request)
    {
        $user = Auth::user();
        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $order = Order::create([
            'date' => now(),
            'total' => $product->price,
        ]);

        $order->products()->attach($productId, ['quantity' => 1]);
        $order->users()->attach($user->id);

        return response()->json($order, 201);
    }

    public function removeProductFromOrder(Order $order, Product $product)
    {
        $order->products()->detach($product->id);
        return response()->json(null, 204);
    }

    public function getProductsInOrder(Order $order)
    {
        $products = $order->products;
        return response()->json($products);
    }
}
