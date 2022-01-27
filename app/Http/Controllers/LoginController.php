<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    /*
    1. create route for user to login
    2. create page for login
    3. logout
    */

    public function login() {
        return view('auth.login');
    }

    public function check(Request $request){
        $credentials = $request->validate([
            'email' =>'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('user.dashboard'));
        }

        return redirect(route('auth.login'))->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

     }

    public function dashboard() {
         
        return view('home.dashboard');
    }
}
