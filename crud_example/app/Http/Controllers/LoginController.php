<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function loginproses(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->isAdmin()) {
                return redirect('/dashboard');
            } else {
                return redirect('/tambahserviceuser');
            }
        }
        return redirect('login');
    }

    public function register()
    {
        return view('register');
    }
    public function registeruser(Request $request)
    {
        // dd($request->all());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'notelpon' => $request->notelpon,
            'role' => 'user',
            'remember_token' => Str::random(60),
        ]);

        return redirect('/login');
    }
    public function logout()
    {
        Auth::logout();
        return  redirect('login');
    }
}
