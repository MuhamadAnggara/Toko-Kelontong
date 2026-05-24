<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use App\Models\Barang;
use App\Models\Aktivitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuks = BarangMasuk::with(['barang', 'user'])->latest()->get();
        return view('barang_masuk.index', compact('barangMasuks'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('barang_masuk.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'qty' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'supplier' => 'nullable|string|max:255',
            'catatan' => 'nullable|string'
        ]);

        try {
            DB::beginTransaction();

            // Simpan Data Barang Masuk
            $barangMasuk = BarangMasuk::create([
                'barang_id' => $request->barang_id,
                'user_id' => Auth::id(),
                'qty' => $request->qty,
                'tanggal' => $request->tanggal,
                'supplier' => $request->supplier,
                'catatan' => $request->catatan,
            ]);

            // Tambah Stok Barang Tertentu
            $barang = Barang::findOrFail($request->barang_id);
            $barang->increment('stok', $request->qty);

            // Tulis di Log Aktivitas
            Aktivitas::create([
                'judul' => 'Barang Masuk (' . $barang->nama_barang . ')',
                'deskripsi' => 'Admin ' . Auth::user()->name . ' menambahkan ' . $request->qty . ' unit dari supplier ' . ($request->supplier ?: 'Umum'),
                'tipe' => 'info'
            ]);

            DB::commit();

            return redirect()->route('barang-masuk.index')->with('success', 'Data barang masuk berhasil dicatat dan stok bertambah!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }
}
