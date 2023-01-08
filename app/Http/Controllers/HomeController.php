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

    public function detailproduct($id) {
        $item = Item::where('id', $id)->first();

        return view ('detailproduct.index', compact('item'));
    }

    public function profile() {
        $user = User::find(Auth::user()->id);
        return view('profile.index', compact('user'));
    }

    public function editProfile() {
        return view('profile.editprofile');
    }

    public function updateProfile(Request $request) {

        DB::table('users')->where('id', $request->id)->update([
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect('/home');
    }

    public function editPassword() {
        return view('profile.editpassword');
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'oldpassword' => 'required|min:5|max:20',
            'newpassword' => 'required|min:5|max:20'
        ]);

        $user = Auth::user();
        $oldpassword = $request->input('oldpassword');
        if (!Hash::check($oldpassword, $user->password)) {
            return back()->withErrors('Please specify the good current password');
        }
        else{
            $user->fill([
                    'password' => Hash::make($request->newpassword)
                ])->save();
        }
        return redirect('/home');
    }

}
