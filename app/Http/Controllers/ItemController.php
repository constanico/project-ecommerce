<?php

namespace App\Http\Controllers;

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
            "image" => "required",
            "name" => "required|unique|min:5|max:20",
            "desc" => "required|min:5",
            "price" => "required|min:1000",
            "stock" => "required|min:1"
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $file = $request->file('image');

        $imageName = time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $imageName);
        $imageName = 'images/'.$imageName;

        DB::table('items')->insert([
            ['name' => $request->name, 'price' => $request->price, 'desc' => $request->desc, 'stock'=> $request->stock, 'image' => $imageName]
        ]);

        return redirect()->back();
    }
}
