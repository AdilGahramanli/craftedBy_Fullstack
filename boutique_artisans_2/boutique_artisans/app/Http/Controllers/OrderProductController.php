<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Http\Requests\StoreOrderProductRequest;
use App\Http\Requests\UpdateOrderProductRequest;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderProducts = OrderProduct::all();
        return response()->json($orderProducts);
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
    public function store(StoreOrderProductRequest $request)
    {
        $orderProduct = OrderProduct::create($request->all());
        return response()->json($orderProduct, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderProduct $orderProduct)
    {
        return response()->json($orderProduct);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderProduct $orderProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderProductRequest $request, OrderProduct $orderProduct)
    {
        $orderProduct->update($request->all());
        return response()->json($orderProduct);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderProduct $orderProduct)
    {
        $orderProduct->delete();
        return response()->json(null, 204);
    }
}
