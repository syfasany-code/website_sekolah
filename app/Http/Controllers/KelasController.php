<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Support\Facades\Crypt;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::orderBy('created_at', 'desc')->get();
        return view('admin.kelas.index', compact('kelas'));
    }

   public function form($id = null)
{
    if ($id) {
        $kelas = Kelas::findOrFail($id);
    } else {
        $kelas = new Kelas();
    }

    return view('admin.kelas.form', compact('kelas'));
}
    public function save(Request $request, $id = null)
    {
        if ($id) {
            $decryptedId = Crypt::decrypt($id);
            $kelas = Kelas::findOrFail($decryptedId);

            $request->validate([
                'nama_kelas' => 'required|string|max:255|unique:kelas,nama_kelas,' . $kelas->id,
            ], [
                'nama_kelas.required' => 'Nama kelas wajib diisi.',
                'nama_kelas.unique' => 'Nama kelas sudah terdaftar.',
            ]);

            $kelas->update($request->all());
            $message = 'Data kelas berhasil diperbarui.';
        } else {
            $request->validate([
                'nama_kelas' => 'required|string|max:255|unique:kelas,nama_kelas',
            ], [
                'nama_kelas.required' => 'Nama kelas wajib diisi.',
                'nama_kelas.unique' => 'Nama kelas sudah terdaftar.',
            ]);

            Kelas::create($request->all());
            $message = 'Data kelas berhasil ditambahkan.';
        }

        return redirect()->route('admin.kelas.index')->with('success', $message);
    }

    // Method untuk menghapus data kelas
    public function destroy($id)
    {
        $decryptedId = Crypt::decrypt($id);
        $kelas = Kelas::findOrFail($decryptedId);

        // Cek apakah kelas masih memiliki relasi siswa
        if ($kelas->siswas()->count() > 0) {
            return redirect()->route('admin.kelas.index')->with('error', 'Kelas tidak dapat dihapus karena masih memiliki siswa.');
        }

        $kelas->delete();

        return redirect()->route('admin.kelas.index')->with('success', 'Data kelas berhasil dihapus.');
    }
}
