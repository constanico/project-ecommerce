<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function deleteCart($id) {
        $cart = DB::table('carts')->where('id', $id)->first();

        if(isset($cart)) {
            $cart = DB::table('carts')->where('id', $id)->delete();
        }

        return redirect('/home');
    }

    public function editCart($id) {
        $cart = Cart::where('id', $id)->first();
        return view('cart.editcart', compact('cart'));
    }

    public function updateCart(Request $request, $id) {
        $cart = Cart::where('id', $id)->first();

        $request->validate([
            'quantity' => 'min:1'
        ]);

        $cart->quantity = $request->quantity;
        $cart->save();

        return redirect('/cart');
    }
}
