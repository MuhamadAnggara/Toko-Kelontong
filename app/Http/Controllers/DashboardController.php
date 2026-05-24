<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Kasir;
use App\Models\Aktivitas;

class DashboardController extends Controller
{
    public function index()
    {
        $total_barang = Barang::count();
        $total_kategori = Kategori::count();
        $total_kasir = Kasir::count();

        // 5 Aktivitas Terbaru
        $aktivitas_terbaru = Aktivitas::latest()->take(5)->get();

        return view('dashboard', compact('total_barang', 'total_kategori', 'total_kasir', 'aktivitas_terbaru'));
    }
}
