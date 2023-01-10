<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            if (!isset($items[$cartItem->itemId]) || $items[$cartItem->itemId] < $cartItem->quantity) {
                return redirect('/cart');
            }
        }

        DB::transaction(function() use ($cart) {
            $order = Order::create([
                'userId' => auth()->id(),
                'totalPrice' => 0
            ]);

            foreach ($cart as $cartItem) {
                $order->items()->attach($cartItem->itemId, [
                    'quantity' => $cartItem->quantity,
                    'name' => $cartItem->itemName,
                    'price' => $cartItem->price
                ]);

                $order->increment('totalPrice', $cartItem->quantity * $cartItem->item->price);

                Item::find($cartItem->itemId)->decrement('stock', $cartItem->quantity);
            }

            Cart::where('userId', auth()->id())->delete();

            return redirect('/home');
        });
    }
}
