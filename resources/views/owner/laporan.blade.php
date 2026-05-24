@extends('layouts.app')

@section('header', 'Pusat Data & Laporan Lengkap')

@section('content')
<div class="bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 min-h-[500px] flex flex-col items-center justify-center text-center">
    <div class="w-24 h-24 bg-indigo-50 text-indigo-400 rounded-full flex items-center justify-center mb-6">
        <i class="ph-fill ph-chart-line-up text-5xl"></i>
    </div>
    <h3 class="text-2xl font-bold text-slate-800 mb-2">Modul Laporan Lengkap (Tahap Pengembangan)</h3>
    <p class="text-slate-500 max-w-lg mb-8">
        Halaman ini nantinya akan berisi laporan pendapatan & laba yang rinci, beserta seluruh laporan stok keseluruhan dan arsip riwayat transaksi secara periodik. Saat ini baru tersedia secara visual (mockup).
    </p>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 w-full max-w-2xl text-left">
        <div class="p-4 border border-slate-200 rounded-2xl hover:border-indigo-300 hover:bg-slate-50 transition cursor-pointer flex items-center group">
             <i class="ph-fill ph-money text-3xl text-emerald-500 mr-4 group-hover:scale-110 transition"></i>
             <div>
                <h4 class="font-bold text-slate-800">Laporan Pendapatan & Laba</h4>
                <p class="text-xs text-slate-500 mt-1">Cetak PDF neraca harian, mingguan, bulanan</p>
             </div>
        </div>
        <div class="p-4 border border-slate-200 rounded-2xl hover:border-indigo-300 hover:bg-slate-50 transition cursor-pointer flex items-center group">
             <i class="ph-fill ph-stack text-3xl text-indigo-500 mr-4 group-hover:scale-110 transition"></i>
             <div>
                <h4 class="font-bold text-slate-800">Laporan Stok Keseluruhan</h4>
                <p class="text-xs text-slate-500 mt-1">Lacak pergerakan mutasi, retur, dan stok limit</p>
             </div>
        </div>
    </div>
</div>
@endsection
