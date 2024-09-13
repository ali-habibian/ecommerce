<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index($category)
    {
        $category = Category::findBySlug($category);
        $products = Product::where('category_id', $category->id)->get();

        return view('home.products.index', compact('products', 'category'));
    }
}
