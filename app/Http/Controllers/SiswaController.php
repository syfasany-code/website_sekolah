<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')->orderBy('created_at', 'desc')->get();

        return view('admin.siswa.index', compact('siswa'));
    }

    public function addEdit($id = null)
{
    $siswa = null;
    if ($id) {
        $decryptedId = Crypt::decrypt($id);
        $siswa = Siswa::findOrFail($decryptedId);
    }

    // Pastikan baris ini ada:
    $kelas = Kelas::all();

    // Pastikan 'kelas' dimasukkan ke dalam compact:
    return view('admin.siswa.form', compact('siswa', 'kelas'));
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
    'nisn' => 'required',
    'nama_siswa' => 'required',
    'jenis_kelamin' => 'required',
    'id_kelas' => 'required',
    'tahun_masuk' => 'required',
]);

    // Logika Edit atau Tambah Baru
    if ($id) {
        $decryptedId = Crypt::decrypt($id);
        $siswa = Siswa::findOrFail($decryptedId);
    } else {
        $siswa = new Siswa();
    }

    $siswa->nisn = $request->nisn;
    $siswa->nama_siswa = $request->nama_siswa;
    $siswa->jenis_kelamin = $request->jenis_kelamin;

    // Pastikan menyimpannya ke kolom id_kelas
    $siswa->id_kelas = $request->id_kelas;

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
}
