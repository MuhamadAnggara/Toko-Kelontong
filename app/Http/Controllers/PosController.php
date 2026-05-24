<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Aktivitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PosController extends Controller
{
    public function index()
    {
        // Pos only for cashier (allow admin to test too)
        $barangs = Barang::where('stok', '>', 0)->get();
        return view('kasir.pos', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'uang_bayar' => 'required|numeric',
            'metode_pembayaran' => 'required|string',
            'items' => 'required|array',
            'items.*.id' => 'required|exists:barangs,id',
            'items.*.qty' => 'required|numeric|min:1',
        ]);

        try {
            DB::beginTransaction();

            $total_harga = 0;
            $details = [];

            // Calculate total and prepare details
            foreach ($request->items as $item) {
                $barang = Barang::findOrFail($item['id']);
                
                if ($barang->stok < $item['qty']) {
                    return response()->json(['success' => false, 'message' => 'Stok ' . $barang->nama_barang . ' tidak mencukupi.'], 400);
                }

                $subtotal = $barang->harga_jual * $item['qty'];
                $total_harga += $subtotal;

                $details[] = [
                    'barang_id' => $barang->id,
                    'qty' => $item['qty'],
                    'harga_satuan' => $barang->harga_jual,
                    'subtotal' => $subtotal,
                ];
            }

            if ($request->uang_bayar < $total_harga) {
                return response()->json(['success' => false, 'message' => 'Uang bayar tidak mencukupi.'], 400);
            }

            $kembalian = $request->uang_bayar - $total_harga;
            $no_nota = 'INV-' . date('Ymd') . '-' . strtoupper(uniqid());

            // Save transaksi
            $transaksi = Transaksi::create([
                'no_nota' => $no_nota,
                'user_id' => Auth::id(),
                'total_harga' => $total_harga,
                'uang_bayar' => $request->uang_bayar,
                'kembalian' => $kembalian,
                'metode_pembayaran' => $request->metode_pembayaran,
            ]);

            // Save details & deduct stock
            foreach ($details as $d) {
                $d['transaksi_id'] = $transaksi->id;
                DetailTransaksi::create($d);

                $barang = Barang::find($d['barang_id']);
                $barang->decrement('stok', $d['qty']);
            }

            // Log Aktivitas
            Aktivitas::create([
                'judul' => 'Transaksi Baru (' . $no_nota . ')',
                'deskripsi' => 'Kasir ' . Auth::user()->name . ' memproses transaksi sebesar Rp' . number_format($total_harga, 0, ',', '.'),
                'tipe' => 'info'
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Transaksi berhasil!',
                'transaksi_id' => $transaksi->id,
                'kembalian' => $kembalian,
                'no_nota' => $no_nota
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan sistem: ' . $e->getMessage()], 500);
        }
    }
}
