@extends('layouts.app')

@section('header', 'Dashboard Utama')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Card Barang -->
    <div class="bg-white rounded-3xl p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 relative overflow-hidden group hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
        <div class="absolute right-0 top-0 -mr-6 -mt-6 w-24 h-24 rounded-full bg-indigo-50 opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
        <div class="flex items-start justify-between relative z-10">
            <div>
                <p class="text-sm font-semibold text-slate-400 uppercase tracking-widest mb-1">Total Barang</p>
                <h3 class="text-4xl font-extrabold text-slate-800">{{ $total_barang ?? 0 }}</h3>
                <p class="text-xs text-emerald-500 font-medium mt-2 flex items-center bg-emerald-50 px-2 py-1 rounded-lg w-fit">
                    <i class="ph-bold ph-trend-up mr-1 text-sm"></i> +12% dari bulan lalu
                </p>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-indigo-500 text-white flex items-center justify-center shadow-lg shadow-indigo-200">
                <i class="ph-fill ph-package text-3xl"></i>
            </div>
        </div>
    </div>

    <!-- Card Kategori -->
    <div class="bg-white rounded-3xl p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 relative overflow-hidden group hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
        <div class="absolute right-0 top-0 -mr-6 -mt-6 w-24 h-24 rounded-full bg-rose-50 opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
        <div class="flex items-start justify-between relative z-10">
            <div>
                <p class="text-sm font-semibold text-slate-400 uppercase tracking-widest mb-1">Kategori</p>
                <h3 class="text-4xl font-extrabold text-slate-800">{{ $total_kategori ?? 0 }}</h3>
                <p class="text-xs text-rose-500 font-medium mt-2 flex items-center bg-rose-50 px-2 py-1 rounded-lg w-fit">
                    <i class="ph-bold ph-info mr-1 text-sm"></i> Perlu update
                </p>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-rose-500 text-white flex items-center justify-center shadow-lg shadow-rose-200">
                <i class="ph-fill ph-tag text-3xl"></i>
            </div>
        </div>
    </div>

    <!-- Card Kasir -->
    <div class="bg-white rounded-3xl p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 relative overflow-hidden group hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
        <div class="absolute right-0 top-0 -mr-6 -mt-6 w-24 h-24 rounded-full bg-emerald-50 opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
        <div class="flex items-start justify-between relative z-10">
            <div>
                <p class="text-sm font-semibold text-slate-400 uppercase tracking-widest mb-1">Total Kasir</p>
                <h3 class="text-4xl font-extrabold text-slate-800">{{ $total_kasir ?? 0 }}</h3>
                <p class="text-xs text-emerald-500 font-medium mt-2 flex items-center bg-emerald-50 px-2 py-1 rounded-lg w-fit">
                    <i class="ph-bold ph-check-circle mr-1 text-sm"></i> Aktif semua
                </p>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-emerald-500 text-white flex items-center justify-center shadow-lg shadow-emerald-200">
                <i class="ph-fill ph-users text-3xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Laporan Ringkasan Cepat -->
<div class="bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 mt-8">
    <div class="flex justify-between items-end mb-6">
        <div>
            <h4 class="text-lg font-bold text-slate-800">Aktivitas Terbaru</h4>
            <p class="text-sm text-slate-500">Ringkasan aktivitas sistem secara real-time</p>
        </div>
        <button class="px-5 py-2.5 bg-indigo-50 text-indigo-600 rounded-xl text-sm font-bold hover:bg-indigo-600 hover:text-white transition-all shadow-sm">Lihat Semua Laporan</button>
    </div>
    
    <div class="space-y-4">
        @forelse($aktivitas_terbaru as $aktivitas)
        <div class="flex items-center p-4 hover:bg-slate-50 rounded-2xl transition border border-transparent hover:border-slate-100 cursor-pointer">
            <div class="w-10 h-10 rounded-full flex items-center justify-center mr-4 
                {{ $aktivitas->tipe == 'success' ? 'bg-emerald-100 text-emerald-600' : '' }}
                {{ $aktivitas->tipe == 'info' ? 'bg-indigo-100 text-indigo-600' : '' }}
                {{ $aktivitas->tipe == 'warning' ? 'bg-rose-100 text-rose-600' : '' }}">
                @if($aktivitas->tipe == 'success')
                    <i class="ph-bold ph-plus"></i>
                @elseif($aktivitas->tipe == 'info')
                    <i class="ph-bold ph-pencil-simple"></i>
                @elseif($aktivitas->tipe == 'warning')
                    <i class="ph-bold ph-trash"></i>
                @else
                    <i class="ph-bold ph-bell"></i>
                @endif
            </div>
            <div class="flex-1">
                <p class="font-bold text-slate-800">{{ $aktivitas->judul }}</p>
                <p class="text-xs text-slate-500 mt-0.5">{{ $aktivitas->deskripsi }}</p>
            </div>
            <span class="text-xs font-semibold text-slate-400 bg-slate-100 px-3 py-1 rounded-full whitespace-nowrap">{{ $aktivitas->created_at->diffForHumans() }}</span>
        </div>
        @empty
        <div class="flex flex-col items-center justify-center py-10 bg-slate-50/50 rounded-2xl border border-slate-100 border-dashed">
            <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-full flex items-center justify-center mb-4">
                <i class="ph-fill ph-clock-counter-clockwise text-3xl"></i>
            </div>
            <p class="text-slate-500 font-semibold text-center mb-1">Belum ada aktivitas terbaru</p>
            <p class="text-slate-400 text-sm text-center">Aktivitas penambahan barang atau transaksi akan muncul di sini.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
