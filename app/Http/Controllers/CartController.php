<?php

namespace App\Http\Controllers;

use App\Http\Constants\CartStatusEnum;
use Illuminate\Http\Client\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->carts()->where('status', CartStatusEnum::Pending)->first();

        if (!$cart) {
            return redirect()->back()->with('success', 'سبد خرید شما خالی است');
        }

        $cartItems = $cart->cartItems()->with('product')->get();

        return view('home.cart', compact('cartItems'));
    }

    public function updateItem(Request $request)
    {
        $request->validate([
            'cart_item_id' => 'required|exists:cart_items,id',
            'quantity' => 'required|integer|min:1',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $cartItem = CartItem::findOrFail($request->cart_item_id);
                $cartItem->quantity = $request->quantity;
                $cartItem->save();

                // Recalculate cart totals
                $cart = $cartItem->cart;
                $cart->updateTotals();
            });

            return response()->json(['message' => 'Cart updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update cart'], 500);
        }
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
