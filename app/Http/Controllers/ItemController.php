<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function index() {
        return view('item.index');
    }

    public function detailproduct($id) {
        $item = Item::where('id', $id)->first();

        return view ('detailproduct.index', compact('item'));
    }

    public function addItem(Request $request) {
        $request->validate([
            'name' => 'required|unique:items|min:5|max:20',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'desc' => 'required|min:5',
            'price' => 'required|numeric|min:1000',
            'stock' => 'required|numeric|min:1'
        ]);

        $file = $request->file('image');

        $imageName = time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $imageName);
        $imageName = 'images/'.$imageName;

        DB::table('items')->insert([
            [
                'name' => $request->name,
                'image' => $imageName,
                'price' => $request->price,
                'desc' => $request->desc,
                'stock'=> $request->stock
            ]
        ]);

        return redirect('/home');
    }

    public function deleteItem(Item $item) {
        dd($item);
        // $item = DB::table('items')->where('id', $id)->first();;

        // if(isset($item)) {
        //     $item = DB::table('items')->where('id', $id)->delete();
        // }

        return redirect('/home');
    }
}
