<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::latest()->get();
        return view('admin.guru.index', compact('guru'));
    }

    public function addEdit($id = null)
    {
        // Cek hak akses role
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Anda tidak memiliki izin untuk mengelola data guru.');
        }

        try {
            $guru = $id
                ? Guru::findOrFail(Crypt::decrypt($id))
                : null;
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.guru.index')
                ->with('error', 'Data guru tidak ditemukan.');
        }

        return view('admin.guru.form', compact('guru'));
    }


    public function show($id)
    {
        try {
            // Dekripsi ID dari URL
            $decryptedId = Crypt::decrypt($id);

            // Cari data guru berdasarkan ID
            $guru = Guru::findOrFail($decryptedId);
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.guru.index')
                ->with('error', 'Data guru tidak ditemukan.');
        }

        return view('admin.guru.show', compact('guru'));
    }

    public function save(Request $request, $id = null)
    {
        if ($id) {
            try {
                $id = Crypt::decrypt($id);
                $guru = Guru::findOrFail($id);
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.guru.index')
                    ->with('error', 'Data guru tidak ditemukan.');
            }
        } else {
            $guru = new Guru();
        }

        // VALIDASI
        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'mapel'     => 'required|string|max:40',
            'nip'       => 'nullable|unique:guru,nip,' . ($id ?? 'NULL') . ',id_guru',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // SIMPAN DATA
        $guru->nama_guru = $request->nama_guru;
        $guru->nip       = $request->nip;
        $guru->mapel     = $request->mapel;

        // 🔥 UPLOAD FOTO (VERSI PALING AMAN)
        if ($request->hasFile('foto')) {

            // hapus foto lama (kalau ada)
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }

            // ambil file
            $file = $request->file('foto');

            // buat nama unik
            $namaFile = time() . '_' . $file->getClientOriginalName();

            // simpan ke storage/app/public/guru
            $file->storeAs('guru', $namaFile, 'public');

            // simpan path ke DB
            $guru->foto = 'guru/' . $namaFile;
        }

        $guru->save();

        return redirect()
            ->route('admin.guru.index')
            ->with('success', $id ? 'Data guru berhasil diperbarui.' : 'Data guru berhasil disimpan.');
    }

    public function destroy($id)
    {
        try {
                $guru = Guru::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
                return redirect()
                    ->route('admin.guru.index')
                    ->with('error', 'data guru tidak ditemukan.');
        }

        if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()
                ->route('admin.guru.index')
                ->with('success', 'Data guru berhasil dihapus.');
    }

    public function publicGuru()
    {
        $guru = Guru::all();
        return view('public.guru', compact('guru'));
    }
}
