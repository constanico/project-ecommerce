<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::get();
        // $orders = Order::selectRaw('id, totalPrice, DATE(created_at) as created_date')
        //     ->orderBy('created_date', 'desc')
        //     ->get()->groupBy('created_date');
        $detail = OrderDetail::get();

        return view('order.index', compact('orders'), compact('detail'));
    }

    public function checkOut() {
        $cart = Cart::with(relations:'item')->where('userId', auth()->id())->get();
        $items = Item::select('id', 'stock')->
        whereIn('id', $cart->pluck('itemId'))->pluck('stock', 'id');
        foreach ($cart as $cartProduct) {
            if (!isset($products[$cartProduct->itemId]) || $items[$cartProduct->itemId] < $cartProduct->quantity) {
                return redirect('/cart');
            }
        }

        DB::transaction(function() use ($cart) {
            $order = Order::create([
                'userId' => auth()->id(),
                'totalPrice' => 0
            ]);

            foreach ($cart as $cartItem) {
                OrderDetail::create([
                    'itemId' => $cartItem->itemId,
                    'name' => $cartItem->itemName,
                    'orderId' => $order->id,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->item->price
                ]);

                $order->increment('totalPrice', $cartItem->quantity * $cartItem->item->price);

                Item::find($cartItem->itemId)->decrement('stock', $cartItem->quantity);
            }

            Cart::where('userId', auth()->id())->delete();

            return redirect('/history');
        });
    }
}
