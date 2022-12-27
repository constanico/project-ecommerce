<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function order(Request $request, $id) {
        $item = Item::where('id', $id)->first();
        $date = Carbon::now()->format('Y.m.d');

        if($request->quantity > $item->stock) {
            return redirect('home/'.$id);
        }

        $order_check = Order::where('user_id', Auth::user()->id)->where('status',0)->first();

        if(empty($order_check)) {
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->date = $date;
            $order->status = 0;
            $order->total = 0;
            $order->save();
        }

        $new_order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();

        $order_details_check = OrderDetails::where('item_id', $item->id)->where('order_id',$new_order->id)->first();

        if(empty($order_details_check)) {
            $order_details = new OrderDetails;
            $order_details->item_id = $item->id;
            $order_details->order_id = $new_order;
            $order_details->total = $request->quantity;
            $order_details->total_price = $item->price*$request->quantity;
            $order_details->save();
        }
        else {
            $order_details = OrderDetails::where('item_id', $item->id)->where('order_id',$new_order->id)->first();
            $order_details->total = $order_details->total+$request->quantity;
            $new_order_details = $item->price*$request->quantity;
            $order_details->total_price = $order_details->total+$new_order_details;
            $order_details->update();
        }

        $order = Order::where('user_id', Auth::user()->id)->where('status',0)->first();
        $order->total_price = $order->total_price+$item->price*$request->quantity;
        $order->update();

        return redirect('home');
    }
}
