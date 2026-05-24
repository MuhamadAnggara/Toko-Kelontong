@extends('layouts.app')

@section('header', 'Riwayat Barang Masuk')

@section('content')
<div class="bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 flex flex-col h-full overflow-hidden fade-in">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-800 tracking-tight">Data Barang Masuk</h2>
            <p class="text-slate-500 font-medium mt-1">Riwayat stok barang masuk atau restock dari supplier.</p>
        </div>
        
        <a href="{{ route('barang-masuk.create') }}" class="px-5 py-2.5 bg-indigo-600 text-white font-bold rounded-xl shadow-md hover:bg-indigo-700 transition flex items-center">
            <i class="ph-bold ph-plus mr-2"></i> Input Barang Masuk
        </a>
    </div>

    <!-- Tabel Data -->
    <div class="bg-white rounded-2xl border border-slate-200/60 overflow-hidden shadow-sm flex-1 flex flex-col">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-200/60 text-slate-500 text-sm">
                        <th class="py-4 px-6 font-bold uppercase tracking-wider">Tanggal</th>
                        <th class="py-4 px-6 font-bold uppercase tracking-wider">Nama Barang</th>
                        <th class="py-4 px-6 font-bold uppercase tracking-wider">Supplier</th>
                        <th class="py-4 px-6 font-bold uppercase tracking-wider text-center">Jumlah Stok Masuk</th>
                        <th class="py-4 px-6 font-bold uppercase tracking-wider">Pencatat</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($barangMasuks as $bm)
                    <tr class="hover:bg-indigo-50/30 transition-colors">
                        <td class="py-5 px-6 font-semibold text-slate-800">{{ \Carbon\Carbon::parse($bm->tanggal)->format('d M Y') }}</td>
                        <td class="py-5 px-6">
                            <span class="font-black text-slate-800">{{ $bm->barang->nama_barang ?? 'Barang Telah Dihapus' }}</span>
                            @if($bm->catatan)
                                <span class="block text-xs text-slate-400 mt-0.5">Catatan: {{ $bm->catatan }}</span>
                            @endif
                        </td>
                        <td class="py-5 px-6 font-medium text-slate-600">{{ $bm->supplier ?? '-' }}</td>
                        <td class="py-5 px-6 text-center">
                            <span class="px-3 py-1 bg-emerald-100 text-emerald-700 font-bold rounded-lg">+ {{ $bm->qty }} Unit</span>
                        </td>
                        <td class="py-5 px-6 font-medium text-slate-600">{{ $bm->user->name }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-12 text-center">
                            <div class="w-24 h-24 bg-slate-50 text-slate-300 rounded-full flex items-center justify-center mx-auto mb-4 scale-75">
                                <i class="ph-fill ph-package text-5xl"></i>
                            </div>
                            <h3 class="text-lg font-bold text-slate-700 mb-1">Belum Ada Transaksi Barang Masuk</h3>
                            <p class="text-slate-500 font-medium">Silakan klik "Input Barang Masuk" untuk menambah stok gudang.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
