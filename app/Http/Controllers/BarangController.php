<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Aktivitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('kategori')->get();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('barang.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->merge([
            'harga_jual' => str_replace('.', '', $request->harga_jual),
            'harga_beli' => 0
        ]);

        $request->validate([
            'kode_barang' => 'required|unique:barangs',
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        Barang::create($data);
        Aktivitas::create([
            'judul' => 'Barang Baru Ditambahkan',
            'deskripsi' => 'Barang ' . $request->nama_barang . ' telah ditambahkan ke database.',
            'tipe' => 'success'
        ]);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        $kategoris = Kategori::all();
        return view('barang.edit', compact('barang', 'kategoris'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->merge([
            'harga_jual' => str_replace('.', '', $request->harga_jual),
            'harga_beli' => 0
        ]);

        $request->validate([
            'kode_barang' => 'required|unique:barangs,kode_barang,'.$barang->id,
            'nama_barang' => 'required',
            'kategori_id' => 'required',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('gambar')) {
            if ($barang->gambar) {
                Storage::disk('public')->delete($barang->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        $barang->update($data);
        Aktivitas::create([
            'judul' => 'Data Barang Diubah',
            'deskripsi' => 'Data untuk barang ' . $request->nama_barang . ' telah diperbarui.',
            'tipe' => 'info'
        ]);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate.');
    }

    public function destroy(Barang $barang)
    {
        $nama_barang = $barang->nama_barang;
        if ($barang->gambar) {
            Storage::disk('public')->delete($barang->gambar);
        }
        $barang->delete();
        Aktivitas::create([
            'judul' => 'Barang Dihapus',
            'deskripsi' => 'Barang ' . $nama_barang . ' telah dihapus dari sistem.',
            'tipe' => 'warning'
        ]);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
