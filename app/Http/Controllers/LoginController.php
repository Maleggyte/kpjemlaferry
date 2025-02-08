<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function showLoginForm()
    {
        return view('login.login');
    }

    /**
     * Proses login pengguna.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('dashboard');
            } elseif ($user->role === 'karyawan') {
                return redirect()->route('karyawan');
            } else {
                // Auth::logout();
                return back()->withErrors(['email' => 'Email atau password salah.']);
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }
    /**
     * Proses logout pengguna.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda berhasil logout.');
    }
}
