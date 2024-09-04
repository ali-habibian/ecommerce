<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
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
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('storage/images/products'), $imageName);
        $imagePath = 'images/products/' . $imageName;

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'discounted_price' => $request->discounted_price,
            'cost' => $request->cost,
            'sku' => $request->sku,
            'track_quantity' => $request->track_quantity ?? null,
            'sell_out_of_stock' => $request->sell_out_of_stock ?? null,
            'quantity' => $request->quantity,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'image' => $imagePath,
        ]);

        return response()->json([
            'success' => 'محصول با موفقیت ایجاد شد'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
