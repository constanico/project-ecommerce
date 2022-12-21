<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        return view('home.index', [
            'title' => 'Home',
            'item' => Item::all()
        ]);
    }

    public function viewItem() {
        $item = DB::table('items')->get();

        return view('home.index', compact('item'));
    }

}
