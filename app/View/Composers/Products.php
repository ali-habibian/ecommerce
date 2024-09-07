<?php

namespace App\View\Composers;

use App\Models\Product;
use Illuminate\View\View;

class Products
{
    public function compose(View $view): void
    {
        $products = Product::with('category')
            ->get();

        $view->with('products', $products);
    }
}
