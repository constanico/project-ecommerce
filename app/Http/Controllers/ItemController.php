<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    public function index() {
        return view('item.index', [
            'title' => 'Add Item'
        ]);
    }

    public function addItem(Request $request) {
        $rules = [
            'name' => 'required|unique:items|min:5|max:20',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'desc' => 'required|min:5',
            'price' => 'required|min:1000',
            'stock' => 'required|min:1'
        ];

        $validate = Validator::make($request->all(), $rules);

        if($validate->fails()) {
            return back()->withErrors($validate);
        }

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
}
