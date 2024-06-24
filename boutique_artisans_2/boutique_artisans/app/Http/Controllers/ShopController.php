<?php

namespace App\Http\Controllers;

use App\Models\shop;
use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
 /**
     * @OA\Info(
     *     title="Shop API",
     *     version="1.0.0",
     *     description="API for managing shops",
     * )
     */
class ShopController extends Controller
{
      /**
          * @OA\Get(
          *     path="/shops",
          *     operationId="getShops",
          *     tags={"Shops"},
          *     summary="Get list of all shops",
          *     description="Returns a list of all shops.",
          *     @OA\Response(
          *         response=200,
          *         description="Successful operation",
          *         @OA\MediaType(
          *             mediaType="text/html"
          *         )
          *     )
          * )
          */
    public function index()
    {
        //
        $shops = Shop::all();
        return view('shops', ['shops' => $shops]);
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
    public function store(StoreShopRequest $request)
    {
        $shop = Shop::create($request->all());
        return response()->json($shop, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShopRequest $request, shop $shop)
    {
        return $shop->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(shop $shop)
    {
        return $shop->delete();
    }
}
