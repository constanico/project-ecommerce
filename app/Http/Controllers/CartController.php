<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $id = Auth::user()->id;
        $cart = Cart::where('userId','=',$id)->get();
        return view('cart.index', compact('cart'));
    }

    public function addToCart(Request $request, $id) {
        $user = Auth::user();
        $item = Item::find($id);

        $cart = new Cart;
        $cart->name = $user->username;
        $cart->itemName = $item->name;
        $cart->price = $item->price;
        $cart->quantity = $request->quantity;
        $cart->image = $item->image;
        $cart->itemId = $item->id;
        $cart->userId = $user->id;

        $cart->save();

        return redirect('home');
    }
}
