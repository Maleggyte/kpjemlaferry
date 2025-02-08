<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $title = $request->query('title', 'jadwal');
        $auth = Auth::user();
        $jadwal = Jadwal::all();

        // Kirim data ke view
        return view('dashboard', [
            'title' => $title,
            'auth' => $auth,
            'jadwal' => $jadwal
        ]);
    }

}
