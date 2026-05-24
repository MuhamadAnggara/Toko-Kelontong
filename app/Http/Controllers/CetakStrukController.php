<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class CetakStrukController extends Controller
{
    public function show($id)
    {
        $transaksi = Transaksi::with(['details.barang', 'user'])->findOrFail($id);
        return view('kasir.cetak-struk', compact('transaksi'));
    }
}
