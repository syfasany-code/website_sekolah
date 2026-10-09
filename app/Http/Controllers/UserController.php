<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    // In UserController.php
    public function index()
    {
        // Replace ->get() with ->paginate(10)
        $users = User::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.user.index', compact('users'));
    }

    public function show($id)
    {
        try {
            // Dekripsi ID jika dikirim dalam bentuk terenkripsi, fallback jika ID biasa (integer)
            $decryptedId = is_numeric($id) ? $id : Crypt::decrypt($id);
            $user = User::findOrFail($decryptedId);

            return view('admin.user.show', compact('user'));
        } catch (\Exception $e) {
            return redirect()->route('admin.user.index')
                ->with('error', 'Data pengguna tidak ditemukan.');
        }
    }

    public function addEdit($id = null)
    {
        $user = null;

        if ($id) {
            try {
                $decryptedId = is_numeric($id) ? $id : Crypt::decrypt($id);
                $user = User::findOrFail($decryptedId);
            } catch (\Exception $e) {
                return redirect()->route('admin.user.index')->with('error', 'Pengguna tidak ditemukan.');
            }
        }

        return view('admin.user.form', compact('user'));
    }
}
