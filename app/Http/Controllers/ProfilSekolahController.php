<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilSekolahController extends Controller
{
    public function index()
    {
        $profil = ProfilSekolah::first();
        return view('admin.profil-sekolah.profil', compact('profil'));
    }

    public function edit()
    {
        $profil = ProfilSekolah::first();
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = ProfilSekolah::first() ?? new ProfilSekolah();

        $request->validate([
            'nama_sekolah'   => 'required|string|max:40',
            'kepala_sekolah' => 'required|string|max:40',
            'npsn'           => 'required|string|max:20',
            'kontak'         => 'required|string|max:15',
            'tahun_berdiri'  => 'required|numeric|digits:4',
            'alamat'         => 'required|string',
            'visi_misi'      => 'required|string',
            'deskripsi'      => 'required|string',
            'logo'           => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profil->nama_sekolah   = $request->nama_sekolah;
        $profil->kepala_sekolah = $request->kepala_sekolah;
        $profil->npsn           = $request->npsn;
        $profil->kontak         = $request->kontak;
        $profil->tahun_berdiri  = $request->tahun_berdiri;
        $profil->alamat         = $request->alamat;
        $profil->visi_misi      = $request->visi_misi;
        $profil->deskripsi      = $request->deskripsi;

        // Upload Logo
        if ($request->hasFile('logo')) {
            if ($profil->logo && Storage::disk('public')->exists($profil->logo)) {
                Storage::disk('public')->delete($profil->logo);
            }
            $profil->logo = $request->file('logo')->store('sekolah', 'public');
        }

        // Upload Foto Banner/Gedung Sekolah
        if ($request->hasFile('foto')) {
            if ($profil->foto && Storage::disk('public')->exists($profil->foto)) {
                Storage::disk('public')->delete($profil->foto);
            }
            $profil->foto = $request->file('foto')->store('sekolah', 'public');
        }

        $profil->save();

        return redirect()
            ->route('admin.profil.profil')
            ->with('success', 'Profil sekolah berhasil diperbarui!');
    }
}
