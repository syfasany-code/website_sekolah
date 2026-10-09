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
            return redirect()
                ->route('admin.galeri.index')
                ->with('error', 'Data galeri tidak ditemukan.');
        }

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
        // 1. Validasi Input berdasarkan Kategori
        $request->validate([
            'judul'      => 'required|string|max:255',
            'kategori'   => 'required|in:foto,video',
            'keterangan' => 'required',
            'tanggal'    => 'required|date',
            // File wajib diisi jika kategori FOTO dan membuat data BARU
            'file'       => $request->filled('id')
                            ? 'nullable|image|mimes:jpg,jpeg,png|max:2048'
                            : 'required_if:kategori,foto|nullable|image|mimes:jpg,jpeg,png|max:2048',
            // Link wajib diisi jika kategori VIDEO
            'link'       => 'required_if:kategori,video|nullable|url',
        ]);

        if ($request->filled('id')) {
            $galeri = Galeri::findOrFail($request->id);
        } else {
            $galeri = new Galeri();
        }

        $galeri->judul      = $request->judul;
        $galeri->kategori   = $request->kategori;
        $galeri->keterangan = $request->keterangan;
        $galeri->tanggal    = $request->tanggal;

        // 2. Logika Penanganan Foto & Video
        if ($request->kategori === 'foto') {
            // Kosongkan link video jika ganti kategori ke Foto
            $galeri->link = null;

            // Upload gambar jika ada file baru diunggah
            if ($request->hasFile('file')) {
                // Hapus file lama jika ada (saat update)
                if ($galeri->file && Storage::disk('public')->exists('galeri/' . $galeri->file)) {
                    Storage::disk('public')->delete('galeri/' . $galeri->file);
                }

                $file = $request->file('file');
                $namaFile = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('galeri', $namaFile, 'public');

                $galeri->file = $namaFile;
            }
        } else {
            // Jika kategori VIDEO
            $galeri->link = $request->link;

            // Hapus file gambar jika sebelumnya berupa Foto
            if ($galeri->file && Storage::disk('public')->exists('galeri/' . $galeri->file)) {
                Storage::disk('public')->delete('galeri/' . $galeri->file);
            }
            $galeri->file = null;
        }

        $galeri->save();

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil disimpan.');
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

        // Hapus file dari storage jika berupa foto
        if ($galeri->file && Storage::disk('public')->exists('galeri/' . $galeri->file)) {
            Storage::disk('public')->delete('galeri/' . $galeri->file);
        }

        // Hapus data dari database
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
     * Menampilkan detail 1 foto/video galeri (Halaman PUBLIK)
     * View: resources/views/public/galeri/show.blade.php
     */
    public function publicShow($id)
    {
        try {
            // Dekripsi ID jika terenkripsi
            $decryptedId = Crypt::decrypt($id);
            $galeri = Galeri::findOrFail($decryptedId);
        } catch (DecryptException $e) {
            // Menggunakan primary key jika ID tidak terenkripsi
            $galeri = Galeri::findOrFail($id);
        }

        return view('public.galeri.show', compact('galeri'));
    }
}
