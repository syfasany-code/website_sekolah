<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::latest()->get();

        return view('admin.siswa.index', compact('siswa'));
    }

    public function addEdit($id = null)
    {
        $siswa = null;

        if ($id) {
            try {
                // Decrypt ID terlebih dahulu sebelum dicari di database
                $decryptedId = Crypt::decrypt($id);
                $siswa = Siswa::findOrFail($decryptedId);
            } catch (\Exception $e) {
                // Jika dekripsi gagal / ID tidak valid, kembalikan ke index
                return redirect()->route('admin.siswa.index')->with('error', 'Data tidak ditemukan!');
            }
        }

        return view('admin.siswa.form', compact('siswa'));
    }

    public function show($id)
    {
        try {
            $siswa = Siswa::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.siswa.index')
                ->with('error', 'Data siswa tidak ditemukan.');
        }

        return view('admin.siswa.show', compact('siswa'));
    }

    public function save(Request $request, $id = null)
    {
        $request->validate([
            'nisn' => 'required|digits:10|unique:siswa,nisn,' . $request->id_siswa . ',id_siswa',
            'nama_siswa' => 'required|string|max:40',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_masuk' => 'required|digits:4|integer',
        ]);

        if ($request->id_siswa) {
            $siswa = Siswa::findOrFail($request->id_siswa);
        } else {
            $siswa = new Siswa();
        }

        $siswa->nisn = $request->nisn;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tahun_masuk = $request->tahun_masuk;
        $siswa->save();

        return redirect()->route('admin.siswa.index')->with('success', 'Data berhasil disimpan');
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);

            $data = Siswa::findOrFail($id);
            $data->delete();

            return redirect()->back()
                ->with('success', 'Data berhasil dihapus');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Data gagal dihapus');
        }
    }

    public function publicSiswa()
    {
        $siswa = Siswa::all();
        return view('public.siswa', compact('siswa'));
    }
}
