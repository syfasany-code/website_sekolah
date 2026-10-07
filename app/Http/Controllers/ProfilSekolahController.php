<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use App\Http\Requests\StoreProfilSekolahRequest;
use App\Http\Requests\UpdateProfilSekolahRequest;

class ProfilSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profilSekolah = ProfilSekolah::first();

        return view('admin.profil-sekolah.profil', [
            'title' => 'Profil Sekolah',
            'profilSekolah' => $profilSekolah
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create.profil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfilSekolahRequest $request)
    {
        $validated = $request->validate([
            'nama_sekolah' => 'required|max:255',
            'npsn' => 'nullable|max:10',
            'kepala_sekolah' => 'required|max:255',
            'alamat' => 'required',
            'kontak' => 'nullable|max:15',
            'tahun_berdiri' => 'nullable|digits:4',
            'visi_misi' => 'nullable',
            'deskripsi' => 'nullable',
        ]);

        ProfilSekolah::create($validated);

        return redirect()
            ->route('admin.profil-sekolah.profil')
            ->with('success', 'Data profil sekolah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfilSekolah $profilSekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        // Ambil data profil pertama (atau buat baru jika belum ada)
        $profil = ProfilSekolah::first();
        return view('admin.profil-sekolah.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_sekolah'  => 'required|string|max:255',
            'motto'         => 'nullable|string',
            'sambutan'      => 'nullable|string',
            'visi'          => 'nullable|string',
            'misi'          => 'nullable|string',
            'telepon'       => 'nullable|string',
            'email'         => 'nullable|email',
            'alamat'        => 'nullable|string',
        ]);

        $profil = ProfilSekolah::first() ?? new ProfilSekolah();
        $profil->fill($request->all());
        $profil->save();

        return redirect()->back()->with('success', 'Profil sekolah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfilSekolah $profilSekolah)
    {
        //
    }

    public function publicProfilSekolah()
    {
        $profilSekolah = ProfilSekolah::all();
        return view('public.profil', compact('profilSekolah'));
    }
}
