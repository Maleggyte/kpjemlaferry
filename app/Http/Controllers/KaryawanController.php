<?php

namespace App\Http\Controllers;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function KaryawanRead(Request $request)
    {
        $title = $request->query('title', 'karyawan');
        $auth = Auth::user();
        $user = User::all();

        // Kirim data ke view
        return view('datakaryawan.karyawan-read', [
            'title' => $title,
            'auth' => $auth,
            'user' => $user
        ]);
    }

    public function KaryawanCreate()
    {
        return view('datakaryawan.karyawan-create');
    }

    public function KaryawanAdd(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'tanggal_lahir' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string'
        ]);


        User::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect()->route('karyawan-read')->with('success', 'Anda berhasil menambahkan karyawan.');
    }

    public function Delete($id)
    {
        $user = user::findOrFail($id);

        $user->delete();

        session()->flash('success', 'User berhasil dihapus!');

        return redirect()->back();
    }

    public function Edituser($id)
    {
        $user = user::findOrFail($id);
        return view('datakaryawan.karyawan-update', compact('User'));
    }

    public function UpdateKaryawan(Request $request, $id)
    {
        try {
            $user = user::findOrFail($id);

            $request->validate([
                'nama' => 'required|string',
                'jenis_kelamin' => 'required|string',
                'tanggal_lahir' => 'required|string',
                'email' => 'required|string',
                'password' => 'required|string'
            ]);


            $user->update([
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'email' => $request->email,
                'password' => $request->password
            ]);

            session()->flash('success', 'Data berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation error: ' . $e->validator->errors()->first());
            session()->flash('error', $e->validator->errors()->first());
        } catch (\Exception $e) {
            \Log::error('Update error: ' . $e->getMessage());
            session()->flash('error', 'Terjadi kesalahan saat memperbarui data.');
        }

        return redirect()->route('karyawan-read');
    }

    public function KaryawanLook($id)
    {
        $user = user::findOrFail($id);
        return view('karyawan.karyawan-look', [
            'user' => $user
        ]);
    }
}
