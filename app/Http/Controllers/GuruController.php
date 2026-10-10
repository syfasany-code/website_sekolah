<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Encryption\DecryptException;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::latest()->get();

        return view('admin.guru.index', compact('guru'));
    }

    public function addEdit($id = null)
    {
        $guru = null;

        if ($id) {
            try {
                $decryptedId = Crypt::decrypt($id);
                $guru = Guru::findOrFail($decryptedId);
            } catch (DecryptException $e) {
                return redirect()
                    ->route('admin.guru.index')
                    ->with('error', 'ID tidak valid atau data guru tidak ditemukan.');
            }
        }

        return view('admin.guru.form', compact('guru'));
    }

    public function show($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            $guru = Guru::findOrFail($decryptedId);

            return view('admin.guru.show', compact('guru'));
        } catch (DecryptException $e) {
            return redirect()
                ->route('admin.guru.index')
                ->with('error', 'ID tidak valid atau data guru tidak ditemukan.');
        }
    }

    public function save(Request $request, $id = null)
    {
        $guru = null;
        $decryptedId = null;

        if ($id) {
            try {
                $decryptedId = Crypt::decrypt($id);
                $guru = Guru::findOrFail($decryptedId);
            } catch (DecryptException $e) {
                return redirect()
                    ->route('admin.guru.index')
                    ->with('error', 'Gagal memperbarui data: ID tidak valid.');
            }
        }

        if (!$guru) {
            $guru = new Guru();
        }

        $primaryKey = $guru->getKeyName() ?? 'id_guru';

        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'nip'       => [
                'nullable',
                'string',
                'max:30',
                'unique:guru,nip,' . ($decryptedId ?? 'NULL') . ',' . $primaryKey,
            ],
            'mapel'     => 'required|string|max:40',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $guru->nama_guru = $request->nama_guru;
        $guru->nip       = $request->nip;
        $guru->mapel     = $request->mapel;

        if ($request->hasFile('foto')) {
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }

            $file = $request->file('foto');
            $namaFile = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $path = $file->storeAs('guru', $namaFile, 'public');
            $guru->foto = $path;
        }

        $guru->save();

        return redirect()
            ->route('admin.guru.index')
            ->with('success', $decryptedId ? 'Data guru berhasil diperbarui.' : 'Data guru berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            $guru = Guru::findOrFail($decryptedId);

            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }

            $guru->delete();

            return redirect()
                ->route('admin.guru.index')
                ->with('success', 'Data guru berhasil dihapus.');
        } catch (DecryptException $e) {
            return redirect()
                ->route('admin.guru.index')
                ->with('error', 'Gagal menghapus data: ID tidak valid.');
        }
    }

    public function publicGuru()
    {
        $guru = Guru::latest()->get();

        return view('public.guru', compact('guru'));
    }

    public function publicShow($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            $guru = Guru::findOrFail($decryptedId);
        } catch (DecryptException $e) {
            $guru = Guru::where('id_guru', $id)->firstOrFail();
        }

        return view('public.guru.show', compact('guru'));
    }
}
