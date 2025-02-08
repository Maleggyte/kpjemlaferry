<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Input;
use Illuminate\Support\Facades\Auth;

class InputController extends Controller
{
    public function InputRead(Request $request)
    {
        $title = $request->query('title', 'input');
        $auth = Auth::user();
        $input = Input::all();


        // Kirim data ke view
        return view('inputdataharian.inputdataharian-read', [
            'title' => $title,
            'auth' => $auth,
            'input' => $input
        ]);
    }

    public function InputCreate()
    {
        return view('inputdataharian.inputdataharian-create');
    }

    public function InputAdd(Request $request)
    {
        $request->validate([
            'pelabuhan' => 'required|string',
            'kapal' => 'required|string',
            'tanggal_keberangkatan' => 'required|date',
            'jam_keberangkatan' => 'required|date_format:H:i',
            'trip' => 'required|string',
            'jumlah_trip' => 'required|string',
            'dermaga' => 'required|string',
            'keterangan' => 'required|string'
        ]);


        Input::create([
            'pelabuhan' => $request->pelabuhan,
            'kapal' => $request->kapal,
            'tanggal_keberangkatan' => $request->tanggal_keberangkatan,
            'jam_keberangkatan' => $request->jam_keberangkatan,
            'trip' => $request->trip,
            'jumlah_trip' => $request->jumlah_trip,
            'dermaga' => $request->dermaga,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('input-read')->with('success', 'Anda berhasil menambahkan jadwal.');
    }

    public function Delete($id)
    {
        $input = Input::findOrFail($id);

        $input->delete();

        session()->flash('success', 'Data berhasil dihapus!');

        return redirect()->back();
    }

    public function EditInput($id)
    {
        $input = Input::findOrFail($id);
        return view('inputdataharian.inputdataharian-update', compact('kondisi'));
    }

    public function UpdateInput(Request $request, $id)
    {
        try {
            $input = Input::findOrFail($id);



            $request->validate([
                'pelabuhan' => 'required|string',
                'kapal' => 'required|string',
                'tanggal_keberangkatan' => 'required|date',
                'jam_keberangkatan' => 'required|date_format:H:i',
                'trip' => 'required|string',
                'jumlah_trip' => 'required|string',
                'dermaga' => 'required|string',
                'keterangan' => 'required|string'
            ]);


            $input->update([
                'pelabuhan' => $request->pelabuhan,
                'kapal' => $request->kapal,
                'tanggal_keberangkatan' => $request->tanggal_keberangkatan,
                'jam_keberangkatan' => $request->jam_keberangkatan,
                'trip' => $request->trip,
                'jumlah_trip' => $request->jumlah_trip,
                'dermaga' => $request->dermaga,
                'keterangan' => $request->keterangan
            ]);

            session()->flash('success', 'Data berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error: ' . $e->validator->errors()->first());
            session()->flash('error', $e->validator->errors()->first());
        } catch (\Exception $e) {
            \Log::error('Update error: ' . $e->getMessage());
            session()->flash('error', 'Terjadi kesalahan saat memperbarui data.');
        }

        return redirect()->route('input-read');
    }

    public function InputLook($id)
    {
        $input = Input::findOrFail($id);
        return view('inputdataharian.inputdataharian-look', [
            'input' => $input
        ]);
    }



}


