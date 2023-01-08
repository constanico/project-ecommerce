<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

}
