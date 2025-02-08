<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('login.register');
    }

   public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:100|unique:users,email',
            'nama' => 'required|string|max:30',
            'password' => 'required|string|min:8',   
        ], [
            'email.unique' => 'Email sudah ada.',
        ]);

        User::create([
            'email' => $request->email,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'role' => 'karyawan', // Default role   
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
