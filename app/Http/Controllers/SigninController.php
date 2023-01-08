<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SigninController extends Controller
{
    public function index() {
        return view('signin.index');
    }

    public function postsignin(Request $request){
        $data = $request->validate([
            'title' => 'Sign In',
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:20',
        ]);

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->intended('home');
        }
        return back()->with('error', 'Email atau Password salah');
    }

    public function signout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
