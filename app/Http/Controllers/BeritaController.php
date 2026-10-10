<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
            $decryptedId = Crypt::decrypt($id);
            $berita = Berita::findOrFail($decryptedId);
        } catch (\Exception $e) {
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
        $request->validate([
            'judul'   => 'required|string|max:255',
            'isi'     => 'required',
            'tanggal' => 'required|date',
            'gambar'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            if ($id) {
                $decryptedId = Crypt::decrypt($id);
                $berita = Berita::findOrFail($decryptedId);
            } else {
                $berita = new Berita();
            }

            $berita->judul   = $request->judul;
            $berita->isi     = $request->isi;
            $berita->tanggal = $request->tanggal;

            if ($request->has('status')) {
                $berita->status = $request->status;
            } else {
                $berita->status = $berita->status ?? 'published';
            }

            $slugBase = Str::slug($request->judul);
            $count = Berita::where('slug', 'LIKE', "{$slugBase}%")
                ->where('id_berita', '!=', $berita->id_berita ?? 0)
                ->count();
            $berita->slug = $count > 0 ? "{$slugBase}-" . time() : $slugBase;

            if (Auth::check()) {
                $berita->id_user = Auth::id();
            }

            if ($request->hasFile('gambar')) {
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
                ->with('error', 'Gagal menyimpan ke database: ' . $e->getMessage());
        }
    }

    public function destroy($id)
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

    public function publicShow($identifier)
    {
        $berita = Berita::where('slug', $identifier)->first();

        if (!$berita) {
            try {
                $decryptedId = Crypt::decrypt($identifier);
                $berita = Berita::findOrFail($decryptedId);
            } catch (DecryptException $e) {
                $berita = Berita::where('id_berita', $identifier)->firstOrFail();
            }
        }

        return view('public.berita.show', compact('berita'));
    }
}
