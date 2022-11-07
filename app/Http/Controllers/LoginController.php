<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_action(Request $request)
    {
        $request->validate([
           'email'=>'required|email',
           'password'=>'required'
        ]);

        Auth::attempt($request->except(['_token']));

        if (Auth::check()) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }

    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }

    public function reset_password()
    {
        return view('auth.reset');
    }

    public function reset_password_action(Request $request)
    {
        $request->validate([
            'password_lama'=>'required',
            'password'=>'required|confirmed'
        ]);

        if(!Hash::check($request->password_lama, auth()->user()->password)){
            return back()->with("error", "Password tidak sama!");
        }

        if(!Hash::check($request->password_lama, auth()->user()->password)){
            return back()->with("error", "Passoword berhasil di rubah!");
        }
    }
}
