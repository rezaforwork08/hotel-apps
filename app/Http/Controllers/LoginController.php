<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => 'required'
        ]);

        // jika login berhasil / Auth
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended("/dashboard");
        }

        Alert::error('Upss!!', 'Mohon periksa kembali email dan password anda');

        return back()->withErrors([
            'email' => 'Email atau password salah'
        ])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('login');
    }
}
