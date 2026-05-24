@extends('layouts.app')

@section('header', 'Data Kategori')

@section('content')
<div class="bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 pb-4 border-b border-slate-100">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-800">Manajemen Kategori Barang</h2>
            <p class="text-slate-500 text-sm mt-1">Kelompokkan barang toko ke dalam kategori spesifik</p>
        </div>
        <a href="{{ route('kategori.create') }}" class="mt-4 sm:mt-0 flex items-center px-5 py-2.5 bg-gradient-to-r from-emerald-500 to-teal-600 text-white rounded-xl shadow-lg shadow-emerald-200 hover:shadow-emerald-300 transform hover:-translate-y-0.5 transition-all text-sm font-bold">
            <i class="ph-bold ph-plus-circle mr-2 text-lg"></i> Tambah Kategori
        </a>
    </div>

    <!-- Beautiful Table -->
    <div class="overflow-x-auto rounded-2xl border border-slate-200/60 shadow-sm">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 text-xs uppercase tracking-wider font-bold">
                    <th class="py-4 px-6 rounded-tl-2xl">ID</th>
                    <th class="py-4 px-6 w-1/2">Nama Kategori</th>
                    <th class="py-4 px-6 text-right rounded-tr-2xl">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm text-slate-700 font-medium">
                @forelse($kategoris ?? [] as $k)
                <tr class="hover:bg-emerald-50/30 transition-colors group">
                    <td class="py-4 px-6 text-slate-500 font-bold">#{{ $k->id }}</td>
                    <td class="py-4 px-6">
                        <div class="flex items-center">
                            <i class="ph-fill ph-tag text-emerald-500 text-xl mr-3 opacity-70 group-hover:opacity-100 transition"></i>
                            <span class="font-bold text-slate-800 text-base">{{ $k->nama_kategori }}</span>
                        </div>
                    </td>
                    <td class="py-4 px-6 text-right">
                         <div class="flex items-center justify-end space-x-2">
                            <a href="{{ route('kategori.edit', $k->id) }}" class="w-8 h-8 rounded-xl bg-slate-100 text-slate-500 hover:bg-emerald-100 hover:text-emerald-600 flex items-center justify-center transition-colors shadow-sm">
                                <i class="ph-bold ph-pencil-simple"></i>
                            </a>
                            <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-8 h-8 rounded-xl bg-slate-100 text-slate-500 hover:bg-rose-100 hover:text-rose-600 flex items-center justify-center transition-colors shadow-sm">
                                    <i class="ph-bold ph-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="py-12 px-6 text-center text-slate-400">
                        <i class="ph-fill ph-tag text-5xl mb-3 text-slate-300"></i>
                        <p class="font-semibold text-lg">Belum ada kategori.</p>
                        <p class="text-sm mt-1">Grupkan produk Anda untuk laporan yang lebih baik.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
