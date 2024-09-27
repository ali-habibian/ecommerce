<?php

namespace App\Http\Controllers;

use App\Http\Constants\CartStatusEnum;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Client\Request;

class ProductController extends Controller
{
    public function index($category)
    {
        $category = Category::findBySlug($category);
        $products = Product::where('category_id', $category->id)->get();

        return view('home.products.index', compact('products', 'category'));
    }

    public function show($product)
    {
        $product = Product::findBySlug($product);

        return view('home.products.show-product', compact('product'));
    }

    public function showCartTable()
    {
        // TODO - showCartTable
    }

    public function addToCart($product)
    {
        // TODO change to act general
        $product = Product::findBySlug($product);
        if (!$product) {
            abort(404);
        }

        $userId = auth()->user()->id;

        $cart = Cart::where('user_id', $userId)
            ->where('status', CartStatusEnum::Pending->value)
            ->first();

        if ($cart === null) {
            $cart = new Cart();
            $cart->user_id = $userId;
            $cart->status = CartStatusEnum::Pending->value;
            $cart->save();
        }

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem === null) {
            $cart->cartItems()->create([
                'product_id' => $product->id,
                'quantity' => 1,
                'total_price' => $product->price
            ]);

        } else {
            $cartItem->quantity += 1;
            $cartItem->total_price = $product->price * $cartItem->quantity;
            $cartItem->save();
        }
        $cart->total_price = $cart->total_price + $product->price;
        $cart->save();

        return redirect()->back()->with('success', 'محصول به سبد خرید شما افزوده شد.');
    }

    public function removeCartItem(Request $request)
    {
        // TODO - removeCartItem
    }

    public function clearCart()
    {
        // TODO - clearCart
    }
}
