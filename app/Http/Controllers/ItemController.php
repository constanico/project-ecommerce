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

    public function addItem(Request $request) {
        $rules = $request->validate([
            'name' => 'required|unique:items|min:5|max:20',
            'image' => 'required|image|file|mimes:jpg,png,jpeg',
            'desc' => 'required|min:5',
            'price' => 'required|min:1000',
            'stock' => 'required|min:1'
        ]);

        // $validator = Validator::make($request->all(), $rules);

        // if($validator->fails()) {
        //     return back()->withErrors($validator);
        // }

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

    public function deleteItem($id) {
        DB::delete('DELETE FROM items WHERE id = ?', [$id]);

        return redirect('/home');
    }
}
