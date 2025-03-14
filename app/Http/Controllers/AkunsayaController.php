<?php

namespace App\Http\Controllers;
use App\Models\Akunsaya;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AkunsayaController extends Controller
{
    public function AkunsayaRead(Request $request)
    {
        $title = $request->query('title', 'karyawan');
        $auth = Auth::user();
        $user = User::all();

        // Kirim data ke view
        return view('akunsaya.akunsaya-read', [
            'title' => $title,
            'auth' => $auth,
            'user' => $user
        ]);
    }
}
