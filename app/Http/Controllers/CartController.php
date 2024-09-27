<?php

namespace App\Http\Controllers;

use App\Http\Constants\CartStatusEnum;
use App\Http\Requests\UpdateCartItemRequest;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->carts()->where('status', CartStatusEnum::Pending)->first();

        if (!$cart) {
            return redirect()->back()->with('success', 'سبد خرید شما خالی است');
        }

        $cartItems = $cart->cartItems()->with('product')->get();

        return view('home.cart', compact('cartItems', 'cart'));
    }

    public function updateItem(UpdateCartItemRequest $request)
    {
        try {
            DB::transaction(function () use ($request, &$cartItem) {
                $cartItem = CartItem::findOrFail($request->cart_item_id);
                $cartItem->quantity = $request->quantity;
                $cartItem->total_price = $request->quantity * $cartItem->product->price;
                $cartItem->save();

                $cart = $cartItem->cart;
                $cart->updateTotals();
            });

            return response()->json([
                'message' => 'Cart updated successfully',
                'cart_new_total_price' => format_persian_price($cartItem->cart->total_price),
                'cart_item_new_total_price' => format_persian_price($cartItem->total_price),
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'مشکلی به وجود آمده است، لطفا دوباره تلاش کنید.'], 500);
        }
    }

    public function removeCartItem($id)
    {
        try {
            $cartItem = CartItem::findOrFail($id);
            $cart = $cartItem->cart;

            $cartItem->delete();
            $cart->updateTotals();

            return response()->json([
                'success' => true,
                'cartTotal' => format_persian_price($cart->total_price)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'حذف آیتم از سبد خرید با مشکل مواجه شد'
            ], 500);
        }
    }

    public function clearCart()
    {
        // TODO - clearCart
    }
}
