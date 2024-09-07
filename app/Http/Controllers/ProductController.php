<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = QueryBuilder::for(Product::class)
            ->allowedFilters([AllowedFilter::scope('search', 'whereScout')])
            ->paginate(5)
            ->appends($request->query());

        return view('admin.products.index', compact('products'));
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
        $categories = Category::all();

        return view('admin.products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if (is_null($request->image)) {
            $imagePath = $product->image;
        } else {
            // delete previous image stored in 'storage/' . $product->image
            if (file_exists(public_path('storage/' . $product->image))) {
                File::delete(public_path('storage/' . $product->image));
            }
            // store new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/images/products'), $imageName);
            $imagePath = 'images/products/' . $imageName;
        }

        // update $product
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'discounted_price' => $request->discounted_price,
            'quantity' => $request->quantity,
            'status' => $request->status,
            'category_id' => $request->category_id,
            'image' => $imagePath,
        ]);

        return response()->json([
            'success' => 'محصول با موفقیت ویرایش شد'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (file_exists(public_path('storage/' . $product->image))) {
            File::delete(public_path('storage/' . $product->image));
        }

        $product->delete();

        return to_route('admin.products.index')->with(
            'success', 'محصول با موفقیت حذف شد'
        );
    }
}
