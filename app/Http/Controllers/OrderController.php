<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        return view('order.index');
    }

    public function checkOut() {
        $cart = Cart::with(relations:'item')->where('userId', auth()->id())->get();
        $items = Item::select('id', 'stock')->
        whereIn('id', $cart->pluck('itemId'))->pluck('stock', 'id');
        foreach ($cart as $cartItem) {
            if (!$items[$cartItem->itemId] || $items[$cartItem->itemId] < $cartItem->quantity) {
                return redirect('/home');
            }
        }

        $order = Order::create([
            'userId' => auth()->id(),
            'totalPrice' => 0
        ]);

        foreach ($cart as $cartItem) {
            $order->items()->attach($cartItem->itemId, [
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->price
            ]);

            Item::find($cartItem->itemId)->decrement('stock', $cartItem->quantity);
        }

        Cart::where('userId', auth()->id())->delete();
    }
}
