<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile() {
        $user = User::find(Auth::user()->id);
        return view('profile.index', compact('user'));
    }

    public function editProfile() {
        return view('profile.editprofile');
    }

    public function updateProfile(Request $request) {
        $request->validate([
            'username' => 'required|min:5|max:20|unique:users,username',
            'email' => 'required|email:dns|unique:users,email',
            'phone' => 'required|min:10|max:13',
            'address' => 'required|min:5',
        ]);

        auth()->user()->update([
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
