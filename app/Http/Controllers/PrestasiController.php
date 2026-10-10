<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class PrestasiController extends Controller
{
    // Menampilkan daftar data prestasi
    public function index()
    {
        $prestasi = Prestasi::latest()->get();
        return view('admin.prestasi.index', compact('prestasi'));
    }

    // Menampilkan detail data prestasi
    public function show($id)
    {
        try {
            // Dekripsi ID dari tombol Detail
            $decryptedId = Crypt::decrypt($id);
            $prestasi = Prestasi::findOrFail($decryptedId);
        } catch (DecryptException $e) {
            return redirect()->route('admin.prestasi.index')->with('error', 'Data prestasi tidak valid.');
        }

        return view('admin.prestasi.show', compact('prestasi'));
    }

    // Menampilkan form Tambah (jika $id null) atau Edit (jika $id ada)
    public function addEdit($id = null)
    {
        $prestasi = null;
        if ($id) {
            try {
                // Dekripsi ID yang dikirim dari tombol Edit
                $decryptedId = Crypt::decrypt($id);
                $prestasi = Prestasi::findOrFail($decryptedId);
            } catch (DecryptException $e) {
                return redirect()->route('admin.prestasi.index')->with('error', 'Data tidak valid.');
            }
        }

        return view('admin.prestasi.form', compact('prestasi'));
    }

    // Menyimpan data baru atau memperbarui data lama
    public function save(Request $request, $id = null)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'nama_peraih' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'juara' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($id) {
            try {
                $decryptedId = Crypt::decrypt($id);
                $prestasi = Prestasi::findOrFail($decryptedId);
            } catch (DecryptException $e) {
                return redirect()->route('admin.prestasi.index')->with('error', 'Data tidak valid.');
            }
        } else {
            $prestasi = new Prestasi();
        }

        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('foto')) {
            if ($id && $prestasi->foto && Storage::disk('public')->exists($prestasi->foto)) {
                Storage::disk('public')->delete($prestasi->foto);
            }
            $data['foto'] = $request->file('foto')->store('prestasi', 'public');
        }

        $prestasi->fill($data);
        $prestasi->save();

        $message = $id
            ? 'Data prestasi berhasil diperbarui!'
            : 'Data prestasi berhasil ditambahkan!';

        return redirect()
            ->route('admin.prestasi.index')
            ->with('success', $message);
    }

    // Menghapus data prestasi
    public function delete($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            $prestasi = Prestasi::findOrFail($decryptedId);
        } catch (DecryptException $e) {
            return redirect()->route('admin.prestasi.index')->with('error', 'Data tidak valid.');
        }

        if ($prestasi->foto && Storage::disk('public')->exists($prestasi->foto)) {
            Storage::disk('public')->delete($prestasi->foto);
        }

        $prestasi->delete();

        return redirect()->route('admin.prestasi.index')->with('success', 'Data prestasi berhasil dihapus!');
    }

    public function publicPrestasi()
    {
        $prestasis = Prestasi::latest()->get();

        return view('public.prestasi', compact('prestasis'));
    }

    /**
     * Menampilkan detail 1 prestasi (Halaman PUBLIK)
     * View: resources/views/public/prestasi/show.blade.php
     */
    public function publicShow($id)
    {
        try {
            // Dekripsi ID jika terenkripsi
            $decryptedId = Crypt::decrypt($id);
            $prestasi = Prestasi::findOrFail($decryptedId);
        } catch (DecryptException $e) {
            // Hanya mencari menggunakan nama kolom primary key asli: id_prestasi
            $prestasi = Prestasi::where('id_prestasi', $id)->firstOrFail();
        }

        return view('public.prestasi.show', compact('prestasi'));
    }
}
