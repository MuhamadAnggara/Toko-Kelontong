<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Aktivitas;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::withCount('barangs')->get();
        return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);
        Kategori::create($request->all());
        Aktivitas::create([
            'judul' => 'Kategori Baru Ditambahkan',
            'deskripsi' => 'Kategori ' . $request->nama_kategori . ' telah ditambahkan.',
            'tipe' => 'success'
        ]);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);
        $kategori->update($request->all());
        Aktivitas::create([
            'judul' => 'Data Kategori Diubah',
            'deskripsi' => 'Kategori ' . $request->nama_kategori . ' telah diperbarui.',
            'tipe' => 'info'
        ]);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate.');
    }

    public function destroy(Kategori $kategori)
    {
        $nama_kat = $kategori->nama_kategori;
        $kategori->delete();
        Aktivitas::create([
            'judul' => 'Kategori Dihapus',
            'deskripsi' => 'Kategori ' . $nama_kat . ' telah dihapus dari sistem.',
            'tipe' => 'warning'
        ]);
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
