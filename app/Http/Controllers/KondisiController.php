<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kondisi;
use Illuminate\Support\Facades\Auth;


class KondisiController extends Controller
{
    public function KondisiRead(Request $request)
    {
        $title = $request->query('title', 'kondisi');
        $auth = Auth::user();
        $kondisi = Kondisi::all();

        // Kirim data ke view
        return view('kondisiharian.kondisiharian-read', [
            'title' => $title,
            'auth' => $auth,
            'kondisi' => $kondisi
        ]);
    }

    public function KondisiCreate()
    {
        return view('kondisiharian.kondisiharian-create');
    }

    public function KondisiAdd(Request $request)
    {
        $request->validate([
            'pilih_pelabuhan' => 'required|string',
            'tanggal' => 'required|date',
            'kapal_operasi' => 'required|string',
            'pola_operasi' => 'required|string',
            'kendala' => 'required|string',
            'cuaca_pagi' => 'required|string',
            'cuaca_siang' => 'required|string',
            'cuaca_sore' => 'required|string',
            'cuaca_malam' => 'required|string',
            'angin_pagi' => 'required|string',
            'angin_siang' => 'required|string',
            'angin_sore' => 'required|string',
            'angin_malam' => 'required|string',
            'gelombang_pagi' => 'required|string',
            'gelombang_siang' => 'required|string',
            'gelombang_sore' => 'required|string',
            'gelombang_malam' => 'required|string',
            'lintasan_pagi' => 'required|string',
            'lintasan_siang' => 'required|string',
            'lintasan_sore' => 'required|string',
            'lintasan_malam' => 'required|string'
        ]);


        Kondisi::create([
            'pilih_pelabuhan' => $request->pilih_pelabuhan,
            'tanggal' => $request->tanggal,
            'kapal_operasi' => $request->kapal_operasi,
            'pola_operasi' => $request->pola_operasi,
            'kendala' => $request->kendala,
            'cuaca_pagi' => $request->cuaca_pagi,
            'cuaca_siang' => $request->cuaca_siang,
            'cuaca_sore' => $request->cuaca_sore,
            'cuaca_malam' => $request->cuaca_malam,
            'angin_pagi' => $request->angin_pagi,
            'angin_siang' => $request->angin_siang,
            'angin_sore' => $request->angin_sore,
            'angin_malam' => $request->angin_malam,
            'gelombang_pagi' => $request->gelombang_pagi,
            'gelombang_siang' => $request->gelombang_siang,
            'gelombang_sore' => $request->gelombang_sore,
            'gelombang_malam' => $request->gelombang_malam,
            'lintasan_pagi' => $request->lintasan_pagi,
            'lintasan_siang' => $request->lintasan_siang,
            'lintasan_sore' => $request->lintasan_sore,
            'lintasan_malam' => $request->lintasan_malam

        ]);

        return redirect()->route('kondisi-read')->with('success', 'Anda berhasil menambahkan jadwal.');
    }

    public function Delete($id)
    {
        $kondisi = kondisi::findOrFail($id);

        $kondisi->delete();

        session()->flash('success', 'Data berhasil dihapus!');

        return redirect()->back();
    }

    public function EditKondisi($id)
    {
        $kondisi = kondisi::findOrFail($id);
        return view('kondisiharian.kondisiharian-update', compact('kondisi'));
    }

    public function UpdateKondisi(Request $request, $id)
    {
        try {
            $kondisi = kondisi::findOrFail($id);



            $request->validate([
                'pilih_pelabuhan' => 'required|string',
                'tanggal' => 'date|string',
                'kapal_operasi' => 'required|string',
                'pola_operasi' => 'required|string',
                'kendala' => 'required|string',
                'cuaca_pagi' => 'required|string',
                'cuaca_siang' => 'required|string',
                'cuaca_sore' => 'required|string',
                'cuaca_malam' => 'required|string',
                'angin_pagi' => 'required|string',
                'angin_siang' => 'required|string',
                'angin_sore' => 'required|string',
                'angin_malam' => 'required|string',
                'gelombang_pagi' => 'required|string',
                'gelombang_siang' => 'required|string',
                'gelombang_sore' => 'required|string',
                'gelombang_malam' => 'required|string',
                'lintasan_pagi' => 'required|string',
                'lintasan_siang' => 'required|string',
                'lintasan_sore' => 'required|string',
                'lintasan_malam' => 'required|string'
            ]);

            $kondisi->update([
                'pilih_pelabuhan' => $request->pilih_pelabuhan,
                'tanggal' => $request->tanggal,
                'kapal_operasi' => $request->kapal_operasi,
                'pola_operasi' => $request->pola_operasi,
                'kendala' => $request->kendala,
                'cuaca_pagi' => $request->cuaca_pagi,
                'cuaca_siang' => $request->cuaca_siang,
                'cuaca_sore' => $request->cuaca_sore,
                'cuaca_malam' => $request->cuaca_malam,
                'angin_pagi' => $request->angin_pagi,
                'angin_siang' => $request->angin_siang,
                'angin_sore' => $request->angin_sore,
                'angin_malam' => $request->angin_malam,
                'gelombang_pagi' => $request->gelombang_pagi,
                'gelombang_siang' => $request->gelombang_siang,
                'gelombang_sore' => $request->gelombang_sore,
                'gelombang_malam' => $request->gelombang_malam,
                'lintasan_pagi' => $request->lintasan_pagi,
                'lintasan_siang' => $request->lintasan_siang,
                'lintasan_sore' => $request->lintasan_sore,
                'lintasan_malam' => $request->lintasan_malam
            ]);

            session()->flash('success', 'Data berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error: ' . $e->validator->errors()->first());
            session()->flash('error', $e->validator->errors()->first());
        } catch (\Exception $e) {
            \Log::error('Update error: ' . $e->getMessage());
            session()->flash('error', 'Terjadi kesalahan saat memperbarui data.');
        }

        return redirect()->route('kondisi-read');
    }

    public function KondisiLook($id)
    {
        $kondisi = kondisi::findOrFail($id);
        return view('kondisiharian.kondisiharian-look', [
            'kondisi' => $kondisi
        ]);
    }

}
