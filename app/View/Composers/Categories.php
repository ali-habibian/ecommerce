<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class Categories
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view): void
    {
        $categories = Category::with('children')
            ->whereNull('parent_id')
            ->withCount('products')
            ->having('products_count', '>', 0) // Only categories with products
            ->get();

        $view->with('categories', $categories);
    }
}
