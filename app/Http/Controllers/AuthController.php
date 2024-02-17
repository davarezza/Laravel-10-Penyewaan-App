<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('guest.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],
        [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email salah',
            'password.required' => 'Password wajib diisi',
        ]);

        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($login)) {
            if (Auth::user()->role == 'approver') {
                return redirect('/home')->with('success', 'Login berhasil sebagai approver');
            } elseif (Auth::user()->role == 'admin') {
                return redirect('/home')->with('success', 'Login berhasil sebagai admin');
            }
        }

        return back()->with('loginError', 'Login Failed');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        return redirect('/');
    }
}
