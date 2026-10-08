<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->get();
        return view('admin.galeri.index', compact('galeri'));
    }

    public function show($id)
    {
        try {
            // Dekripsi ID dari URL
            $decryptedId = Crypt::decrypt($id);

            // Cari data galeri berdasarkan ID
            $galeri = Galeri::findOrFail($decryptedId);
        } catch (\Exception $e) {
            // Jika ID tidak valid atau data tidak ditemukan, kembalikan ke halaman index
            return redirect()
                ->route('admin.galeri.index')
                ->with('error', 'Data galeri tidak ditemukan.');
        }

        // Tampilkan view detail galeri
        return view('admin.galeri.show', compact('galeri'));
    }

    public function addEdit($id = null)
    {
        $galeri = null;

        if ($id) {
            try {
                $decryptedId = Crypt::decrypt($id);
                $galeri = Galeri::findOrFail($decryptedId);
            } catch (\Exception $e) {
                return redirect()->route('admin.galeri.index')
                                ->with('error', 'ID Galeri tidak valid atau tidak ditemukan.');
            }
        }

        return view('admin.galeri.form', compact('galeri'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'judul'      => 'required',
            'keterangan' => 'required',
            'tanggal'    => 'required|date',
            'file'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->filled('id')) {
            $galeri = Galeri::findOrFail($request->id);
        } else {
            $galeri = new Galeri();
        }

        $galeri->judul      = $request->judul;
        $galeri->keterangan = $request->keterangan;
        $galeri->tanggal    = $request->tanggal;

        // 🔥 WAJIB (biar gak error lagi)

        // upload gambar
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $namaFile = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('galeri', $namaFile, 'public');

            $galeri->file = $namaFile;
        }

        $galeri->save();

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil disimpan');
    }

    public function destroy($id)
    {
        try {
            $galeri = Galeri::findOrFail($id);
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.galeri.index')
                ->with('error', 'Data galeri tidak ditemukan.');
        }

        // hapus file dari storage
        if ($galeri->file && Storage::disk('public')->exists('galeri/'.$galeri->file)) {
            Storage::disk('public')->delete('galeri/'.$galeri->file);
        }

        // hapus data
        $galeri->delete();

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil dihapus.');
    }

    public function publicGaleri()
    {
        $galeris = Galeri::latest()->get();

        return view('public.galeri', compact('galeris'));
    }

    /**
     * Menampilkan detail 1 foto galeri (Halaman PUBLIK)
     * View: resources/views/public/galeri/show.blade.php
     */
    public function publicShow($id)
    {
        try {
            // Dekripsi ID jika terenkripsi
            $decryptedId = Crypt::decrypt($id);
            $galeri = Galeri::findOrFail($decryptedId);
        } catch (DecryptException $e) {
            // Menggunakan primary key asli: id_galeri
            $galeri = Galeri::where('id_galeri', $id)->firstOrFail();
        }

        return view('public.galeri.show', compact('galeri'));
    }
}

