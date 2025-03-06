<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        return view('backend.admin.berita.index', compact('berita'));
    }
    public function tambah_view()
    {
        $kategori = Berita::all();
        return view('backend.admin.berita.tambah', compact('kategori'));
    }
    public function tambah(Request $request)
    {
        $this->validate($request, [
            'kategori' => 'required',
        ], [
            'kategori.required' => 'Kategori tidak boleh kosong',
        ]);
        Berita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'penulis' => $request->penulis,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('berita.index')->with('success', 'berhasil tambah berita');
    }
    public function hapus($id)
    {
        $berita = Berita::find($id);
        $berita->delete();
        return back()->with('success', 'berhasil melakukan hapus berita');
    }
}
