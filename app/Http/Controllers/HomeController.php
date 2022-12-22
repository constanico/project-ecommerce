<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        return view('home.index', [
            'item' => Item::latest()->paginate(8)
        ]);
    }

    public function search() {
        $item = Item::latest();

        if(request('search')) {
            $item->where('name', 'like', '%' . request('search') . '%');
        }

        return view('search.index', [
            'item' => $item->get()
        ]);
    }

    public function detailproduct($id) {
        $item = Item::where('id', $id)->first();

        return view ('detailproduct.index', compact('item'));
    }

}
