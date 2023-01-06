<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function index() {
        return view('signup.index', [
            'title' => 'Sign Up'
        ]);
    }

    public function postsignup(Request $request){
        $data = $request->validate([
            'username' => 'required|min:5|max:20|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:20',
            'phone' => 'required|min:10|max:13',
            'address' => 'required|min:5',
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect('/signin');
    }
}
