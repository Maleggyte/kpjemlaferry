<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function JadwalRead(Request $request)
    {
        $title = $request->query('title', 'jadwal');
        $auth = Auth::user();
        $jadwal = Jadwal::all();

        // Kirim data ke view
        return view('jadwal.jadwal-read', [
            'title' => $title,
            'auth' => $auth,
            'jadwal' => $jadwal
        ]);
    }

    public function JadwalCreate()
    {
        return view('jadwal.jadwal-create');
    }

    public function JadwalAdd(Request $request)
    {
        $request->validate([
            'pilih_pelabuhan' => 'required|string',
            'nama_kapal' => 'required|string',
            'tanggal_keberangkatan' => 'date',
            'jam_sandar' => 'required|date_format:H:i',
            'jam_keberangkatan' => 'required|date_format:H:i',
            'dermaga' => 'required|string'
        ]);


        Jadwal::create([
            'pilih_pelabuhan' => $request->pilih_pelabuhan,
            'nama_kapal' => $request->nama_kapal,
            'tanggal_keberangkatan' => $request->tanggal_keberangkatan,
            'jam_sandar' => $request->jam_sandar,
            'jam_keberangkatan' => $request->jam_keberangkatan,
            'dermaga' => $request->dermaga
        ]);

        return redirect()->route('jadwal-read')->with('success', 'Anda berhasil menambahkan jadwal.');
    }

    public function Delete($id)
    {
        $jadwal = jadwal::findOrFail($id);

        $jadwal->delete();

        session()->flash('success', 'Data berhasil dihapus!');

        return redirect()->back();
    }

    public function EditJadwal($id)
    {
        $jadwal = jadwal::findOrFail($id);
        return view('jadwal.jadwal-update', compact('jadwal'));
    }

    public function UpdateJadwal(Request $request, $id)
    {
        try {
            $jadwal = jadwal::findOrFail($id);

            $request->merge([
                'jam_sandar' => substr($request->jam_sandar, 0, 5),
                'jam_keberangkatan' => substr($request->jam_keberangkatan, 0, 5),
            ]);


            $request->validate([
                'pilih_pelabuhan' => 'required|string',
                'nama_kapal' => 'required|string',
                'tanggal_keberangkatan' => 'nullable|date',
                'jam_sandar' => 'required|date_format:H:i',
                'jam_keberangkatan' => 'required|date_format:H:i',
                'dermaga' => 'required|string',
            ]);

            $jadwal->update([
                'pilih_pelabuhan' => $request->pilih_pelabuhan,
                'nama_kapal' => $request->nama_kapal,
                'tanggal_keberangkatan' => $request->tanggal_keberangkatan,
                'jam_sandar' => $request->jam_sandar,
                'jam_keberangkatan' => $request->jam_keberangkatan,
                'dermaga' => $request->dermaga,
            ]);

            session()->flash('success', 'Data berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error: ' . $e->validator->errors()->first());
            session()->flash('error', $e->validator->errors()->first());
        } catch (\Exception $e) {
            \Log::error('Update error: ' . $e->getMessage());
            session()->flash('error', 'Terjadi kesalahan saat memperbarui data.');
        }

        return redirect()->route('jadwal-read');
    }

    public function search(Request $request)
    {
        $tanggal = $request->input('tanggal');

        // Filter jadwal berdasarkan tanggal yang dipilih
        $jadwal = Jadwal::whereDate('tanggal_keberangkatan', $tanggal)->get();

        return view('dashboard', compact('jadwal'));
    }

}
