<?php

namespace App\Http\Controllers\Auth\Akun;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    public function index()
    {
        return view('auth.akun.index');
    }
    public function simpan(Request $request)
    {
        // Dapatkan pengguna yang sedang login
        $user = Auth::user();
        // Cek apakah pengguna ditemukan
        if (!$user) {
            return redirect()->back()->with('error', 'Akun tidak ditemukan.');
        }
        // Perbarui nama dan email
        $user->name = $request->name;
        $user->email = $request->email;
        // Simpan perubahan pengguna
        $user->save();
        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
