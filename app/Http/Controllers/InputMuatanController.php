<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InputMuatan;
use Illuminate\Support\Facades\Auth;

class InputMuatanController extends Controller
{
    public function InputMuatanRead(Request $request)
    {
        $title = $request->query('title', 'inputmuatan');
        $auth = Auth::user();
        $inputmuatan = InputMuatan::all();


        // Kirim data ke view
        return view('inputdatamuatan.inputdatamuatan-read', [
            'title' => $title,
            'auth' => $auth,
            'inputmuatan' => $inputmuatan
        ]);
    }

    public function InputMuatanCreate()
    {
        return view('inputdatamuatan.inputdatamuatan-create');
    }

    public function InputMuatanAdd(Request $request)
    {
        $request->validate([
            'nama_kapal' => 'required|string',
            'trip' => 'required|in:1,2,3,4,5,6,7,8',
            'tanggal' => 'date',
            'penumpang_dewasa' => 'integer|min:0',
            'penumpang_lansia' => 'integer|min:0',
            'penumpang_anak' => 'integer|min:0',
            'penumpang_bayi' => 'integer|min:0',
            'golongan_1' => 'integer|min:0',
            'golongan_2' => 'integer|min:0',
            'golongan_3' => 'integer|min:0',
            'golongan_4_penumpang' => 'integer|min:0',
            'golongan_4_barang' => 'integer|min:0',
            'golongan_5_penumpang' => 'integer|min:0',
            'golongan_5_barang' => 'integer|min:0',
            'golongan_6_penumpang' => 'integer|min:0',
            'golongan_6_barang' => 'integer|min:0',
            'golongan_7' => 'integer|min:0',
            'golongan_8' => 'integer|min:0',
            'golongan_9' => 'integer|min:0',
        ]);

        // Hitung total jumlah penumpang & kendaraan
        // Hitung total jumlah
        $jumlah = $request->penumpang_dewasa +
            $request->penumpang_lansia +
            $request->penumpang_anak +
            $request->penumpang_bayi +
            $request->golongan_1 +
            $request->golongan_2 +
            $request->golongan_3 +
            $request->golongan_4_penumpang +
            $request->golongan_4_barang +
            $request->golongan_5_penumpang +
            $request->golongan_5_barang +
            $request->golongan_6_penumpang +
            $request->golongan_6_barang +
            $request->golongan_7 +
            $request->golongan_8 +
            $request->golongan_9;

        // Simpan data ke database
        InputMuatan::create([
            'nama_kapal' => $request->nama_kapal,
            'trip' => $request->trip,
            'tanggal' => $request->tanggal,
            'penumpang_dewasa' => $request->penumpang_dewasa,
            'penumpang_lansia' => $request->penumpang_lansia,
            'penumpang_anak' => $request->penumpang_anak,
            'penumpang_bayi' => $request->penumpang_bayi,
            'golongan_1' => $request->golongan_1,
            'golongan_2' => $request->golongan_2,
            'golongan_3' => $request->golongan_3,
            'golongan_4_penumpang' => $request->golongan_4_penumpang,
            'golongan_4_barang' => $request->golongan_4_barang,
            'golongan_5_penumpang' => $request->golongan_5_penumpang,
            'golongan_5_barang' => $request->golongan_5_barang,
            'golongan_6_penumpang' => $request->golongan_6_penumpang,
            'golongan_6_barang' => $request->golongan_6_barang,
            'golongan_7' => $request->golongan_7,
            'golongan_8' => $request->golongan_8,
            'golongan_9' => $request->golongan_9,
            'jumlah' => $jumlah
        ]);

        return redirect()->route('inputmuatan-read')->with('success', 'Anda berhasil menambahkan jadwal.');
    }

    public function Delete($id)
    {
        $inputmuatan = InputMuatan::findOrFail($id);

        $inputmuatan->delete();

        session()->flash('success', 'Data berhasil dihapus!');

        return redirect()->back();
    }

    public function EditInputMuatan($id)
    {
        $inputmuatan = InputMuatan::findOrFail($id);
        return view('inputdatamuatan.inputdatamuatan-update', compact('inputmuatan'));
    }

    public function UpdateInputMuatan(Request $request, $id)
    {
        try {
            $inputmuatan = InputMuatan::findOrFail($id);



            $request->validate([
                'nama_kapal' => 'required|string',
                'trip' => 'required|in:1,2,3,4,5,6,7,8',
                'tanggal' => 'date',
                'penumpang_dewasa' => 'integer|min:0',
                'penumpang_lansia' => 'integer|min:0',
                'penumpang_anak' => 'integer|min:0',
                'penumpang_bayi' => 'integer|min:0',
                'golongan_1' => 'integer|min:0',
                'golongan_2' => 'integer|min:0',
                'golongan_3' => 'integer|min:0',
                'golongan_4_penumpang' => 'integer|min:0',
                'golongan_4_barang' => 'integer|min:0',
                'golongan_5_penumpang' => 'integer|min:0',
                'golongan_5_barang' => 'integer|min:0',
                'golongan_6_penumpang' => 'integer|min:0',
                'golongan_6_barang' => 'integer|min:0',
                'golongan_7' => 'integer|min:0',
                'golongan_8' => 'integer|min:0',
                'golongan_9' => 'integer|min:0',
                'jumlah' => 'integer|min:0',
            ]);


            $inputmuatan->update([
                'nama_kapal' => $request->nama_kapal,
                'trip' => $request->trip,
                'tanggal' => $request->tanggal,
                'penumpang_dewasa' => $request->penumpang_dewasa,
                'penumpang_lansia' => $request->penumpang_lansia,
                'penumpang_anak' => $request->penumpang_anak,
                'penumpang_bayi' => $request->penumpang_bayi,
                'golongan_1' => $request->golongan_1,
                'golongan_2' => $request->golongan_2,
                'golongan_3' => $request->golongan_3,
                'golongan_4_penumpang' => $request->golongan_4_penumpang,
                'golongan_4_barang' => $request->golongan_4_barang,
                'golongan_5_penumpang' => $request->golongan_5_penumpang,
                'golongan_5_barang' => $request->golongan_5_barang,
                'golongan_6_penumpang' => $request->golongan_6_penumpang,
                'golongan_6_barang' => $request->golongan_6_barang,
                'golongan_7' => $request->golongan_7,
                'golongan_8' => $request->golongan_8,
                'golongan_9' => $request->golongan_9,
                'jumlah' => $request->jumlah,
            ]);

            session()->flash('success', 'Data berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error: ' . $e->validator->errors()->first());
            session()->flash('error', $e->validator->errors()->first());
        } catch (\Exception $e) {
            \Log::error('Update error: ' . $e->getMessage());
            session()->flash('error', 'Terjadi kesalahan saat memperbarui data.');
        }

        return redirect()->route('inputmuatan-read');
    }

    public function InputMuatanLook($id)
    {
        $inputmuatan = InputMuatan::findOrFail($id);
        return view('inputdatamuatan.inputdatamuatan-look', [
            'inputmuatan' => $inputmuatan
        ]);
    }
}
