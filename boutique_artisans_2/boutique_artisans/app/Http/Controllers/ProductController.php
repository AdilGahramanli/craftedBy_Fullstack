<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;

class ProductController extends Controller
{
    /**
         * @OA\Get(
         *     path="/api/products",
         *     tags={"Products"},
         *     summary="Get list of all products",
         *     description="Returns list of products",
         *     @OA\Response(
         *         response=200,
         *         description="Successful operation",
         *     )
         * )
         */
    public function index()
    {
        //
        //return \App\Models\Product::all();
        /*$products = Product::all();
        return view('products', ['products' => $products]);*/

        return $products = Product::all();

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
    public function store(StoreProduitRequest $request)
    {
       $product = Product::create($request->all());
       return response()->json($product, 200);

    }

/**
     * @OA\Get(
     *     path="/products/{id}",
     *     operationId="getProductById",
     *     tags={"Products"},
     *     summary="Get product details by ID",
     *     description="Returns details of a specific product by ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the product to retrieve",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             example="9x508988-2d3g-44f6-ac72-0f93eac22rrd"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\MediaType(
     *             mediaType="text/html"
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Product not found"
     *     )
     * )
     */

    public function show($id)
    {
        //
        /*$product = Product::findOrFail($id);
        return view('product', ['product' => $product]);*/

        return $product = Product::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        return $product->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $produit)
    {
        return $produit->delete();
    }
}
