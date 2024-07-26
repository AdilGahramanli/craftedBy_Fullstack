<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return response()->json($shops);
    }

    public function create()
    {
        //
    }

    public function store(StoreShopRequest $request)
    {
        $shop = Shop::create($request->all());
        return response()->json($shop, 201);
    }

    public function show(Shop $shop)
    {
        return response()->json($shop);
    }

    public function edit(Shop $shop)
    {
        //
    }

    public function update(UpdateShopRequest $request, Shop $shop)
    {
        $shop->update($request->all());
        return response()->json($shop);
    }

    public function destroy(Shop $shop)
    {
        $shop->delete();
        return response()->json(null, 204);
    }
}
