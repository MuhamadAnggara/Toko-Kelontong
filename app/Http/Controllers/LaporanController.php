<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class LaporanController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['user', 'details.barang'])->latest()->get();
        return view('laporan.index', compact('transaksis'));
    }

    public function exportExcel()
    {
        $transaksis = Transaksi::with(['user', 'details.barang'])->latest()->get();
        return view('laporan.excel', compact('transaksis'));
    }

    public function cetakPdf()
    {
        $transaksis = Transaksi::with(['user', 'details.barang'])->latest()->get();
        return view('laporan.pdf', compact('transaksis'));
    }
}
