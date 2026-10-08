<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Storage;

class EkstrakulikulerController extends Controller
{
    public function index()
    {
        $ekskul = Ekstrakulikuler::with('guru')->latest()->get();
        return view('admin.ekstrakulikuler.index', compact('ekskul'));
    }

    public function addEdit($id = null)
    {
        try {
            $ekskul = $id
                ? Ekstrakulikuler::findOrFail(Crypt::decrypt($id))
                : null;
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.ekstrakulikuler.index')
                ->with('error', 'Data ekstrakulikuler tidak ditemukan.');
        }

        $guru = Guru::orderBy('nama_guru', 'asc')->get();

        return view('admin.ekstrakulikuler.form', compact('ekskul'));
    }

    public function show($id)
    {
        try {
            $ekskul = Ekstrakulikuler::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.ekstrakulikuler.index')
                ->with('error', 'Data tidak ditemukan.');
        }

        return view('admin.ekstrakulikuler.show', compact('ekskul'));
    }

    public function save(Request $request, $id = null)
    {
        if ($id) {
            $id = Crypt::decrypt($id);
            $ekskul = Ekstrakulikuler::findOrFail($id);
        } else {
            $ekskul = new Ekstrakulikuler();
        }

        // ✅ VALIDASI (PERHATIKAN INI)
        $request->validate([
            'nama_ekskul'     => 'required',
            'pembina'         => 'required',
            'jadwal_latihan'  => 'required',
            'deskripsi'       => 'required',
            'gambar'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $ekskul->nama_ekskul    = $request->nama_ekskul;
        $ekskul->pembina        = $request->pembina;
        $ekskul->jadwal_latihan = $request->jadwal_latihan;
        $ekskul->deskripsi      = $request->deskripsi;

        // ✅ UPLOAD GAMBAR
        if ($request->hasFile('gambar')) {

            // hapus lama
            if ($ekskul->gambar && Storage::disk('public')->exists($ekskul->gambar)) {
                Storage::disk('public')->delete($ekskul->gambar);
            }

           $file = $request->file('gambar');

            $namaFile = time() . '_' . $file->getClientOriginalName();

            $file->storeAs('ekskul', $namaFile, 'public');

            $ekskul->gambar = 'ekskul/' . $namaFile;
        }

        $ekskul->save();

        return redirect()->route('admin.ekstrakulikuler.index')
            ->with('success', 'Data berhasil disimpan');
    }

    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $data = Ekstrakulikuler::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function publicEkstrakulikuler()
    {
        $ekskuls = Ekstrakulikuler::latest()->get();
        return view('public.ekstrakulikuler', compact('ekskuls'));
    }

    /**
     * Menampilkan detail 1 ekstrakurikuler (Halaman PUBLIK)
     * View: resources/views/public/ekstrakurikuler/show.blade.php
     */
    /**
 * Menampilkan detail 1 ekstrakurikuler (Halaman PUBLIK)
 */
    public function publicShow($id)
    {
        try {
            // Dekripsi jika ID dikirim terenkripsi
            $decryptedId = Crypt::decrypt($id);
            $ekskul = Ekstrakulikuler::findOrFail($decryptedId);
        } catch (DecryptException $e) {
            // Menggunakan nama kolom primary key asli: id_ekstrakulikuler
            $ekskul = Ekstrakulikuler::where('id_ekstrakulikuler', $id)->firstOrFail();
        }

        return view('public.ekstrakuLikuler.show', compact('ekskul'));
    }
}
