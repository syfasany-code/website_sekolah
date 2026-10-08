<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::with('user')->latest('tanggal')->get();
        return view('admin.berita.index', compact('berita'));
    }

    public function show($id)
    {
        try {
            // Dekripsi ID dari URL
            $decryptedId = Crypt::decrypt($id);

            // Ambil data berita berdasarkan ID
            $berita = Berita::findOrFail($decryptedId);
        } catch (\Exception $e) {
            // Jika ID tidak valid atau data tidak ditemukan, kembalikan ke index dengan pesan error
            return redirect()
                ->route('admin.berita.index')
                ->with('error', 'Data berita tidak ditemukan.');
        }

        return view('admin.berita.show', compact('berita'));
    }

    public function addEdit($id = null)
    {
        try {
            $berita = $id
                ? Berita::findOrFail(Crypt::decrypt($id))
                : null;
        } catch (\Exception $e) {
            return redirect()->route('admin.berita.index')->with('error', 'Berita tidak ditemukan');
        }

        return view('admin.berita.form', compact('berita'));
    }

    public function save(Request $request, $id = null)
    {
        try {
            // 1. Dekripsi $id jika ada (Mode Edit)
            if ($id) {
                $decryptedId = Crypt::decrypt($id);
                $berita = Berita::findOrFail($decryptedId);
            } else {
                $berita = new Berita();
            }

            // 2. Validasi Input
            $request->validate([
                'judul'   => 'required|string|max:255',
                'isi'     => 'required',
                'tanggal' => 'required|date',
                'gambar'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            // 3. Set Data
            $berita->judul   = $request->judul;
            $berita->isi     = $request->isi;
            $berita->tanggal = $request->tanggal;

            // Set id_user dari session login (jika ada relasi user)
            if (Auth::check()) {
                $berita->id_user = Auth::id();
            }

            // 4. Handle Upload Gambar
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika sedang mode Edit
                if ($berita->gambar && Storage::disk('public')->exists('berita/' . $berita->gambar)) {
                    Storage::disk('public')->delete('berita/' . $berita->gambar);
                }

                $file = $request->file('gambar');
                $namaFile = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('berita', $namaFile, 'public');

                $berita->gambar = $namaFile;
            }

            $berita->save();

            return redirect()
                ->route('admin.berita.index')
                ->with('success', $id ? 'Berita berhasil diperbarui' : 'Berita berhasil ditambahkan');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $berita = Berita::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()->route('admin.berita.index')->with('error', 'Berita tidak ditemukan');
        }

        if ($berita->gambar && Storage::disk('public')->exists('berita/' . $berita->gambar)) {
            Storage::disk('public')->delete('berita/' . $berita->gambar);
        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus');
    }

    public function publicBerita()
    {
        $beritas = Berita::latest()->get();

        return view('public.berita', compact('beritas'));
    }

    /**
     * Menampilkan detail 1 berita (Halaman PUBLIK)
     * View: resources/views/public/berita/show.blade.php
     */
    public function publicShow($id)
    {
        try {
            // Dekripsi ID jika terenkripsi
            $decryptedId = Crypt::decrypt($id);
            $berita = Berita::findOrFail($decryptedId);
        } catch (DecryptException $e) {
            // Menggunakan primary key asli: id_berita
            $berita = Berita::where('id_berita', $id)->firstOrFail();
        }

        return view('public.berita.show', compact('berita'));
    }
}
