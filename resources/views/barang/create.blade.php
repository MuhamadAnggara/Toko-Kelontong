@extends('layouts.app')

@section('header', 'Tambah Barang Baru')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100">
    <div class="mb-8 pb-4 border-b border-slate-100 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-800">Registrasi Barang</h2>
            <p class="text-slate-500 text-sm mt-1">Masukkan data produk baru ke dalam inventori toko</p>
        </div>
        <a href="{{ route('barang.index') }}" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl font-bold text-sm transition-colors flex items-center shadow-sm">
            <i class="ph-bold ph-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-6 bg-rose-50 border border-rose-200 text-rose-600 px-4 py-3 rounded-xl flex items-start shadow-sm">
            <i class="ph-fill ph-warning-circle text-xl mr-3 mt-0.5"></i>
            <ul class="text-sm font-medium space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-6">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Kode Barang -->
                <div>
                    <label for="kode_barang" class="block text-sm font-bold text-slate-700 mb-2 ml-1">Kode / SKU <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph-fill ph-barcode text-indigo-500 text-lg"></i>
                        </div>
                        <input type="text" name="kode_barang" id="kode_barang" value="{{ old('kode_barang') }}" required class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors placeholder-slate-400 font-mono shadow-inner font-medium uppercase" placeholder="BRG-001">
                    </div>
                </div>

                <!-- Kategori -->
                <div>
                    <label for="kategori_id" class="block text-sm font-bold text-slate-700 mb-2 ml-1">Kategori Barang <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph-fill ph-tag text-indigo-500 text-lg"></i>
                        </div>
                        <select name="kategori_id" id="kategori_id" required class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors shadow-inner font-bold appearance-none">
                            <option value="">Pilih Kategori...</option>
                            @foreach($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500">
                            <i class="ph-bold ph-caret-down"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nama Barang -->
            <div>
                <label for="nama_barang" class="block text-sm font-bold text-slate-700 mb-2 ml-1">Nama Barang Lengkap <span class="text-rose-500">*</span></label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="ph-fill ph-package text-indigo-500 text-lg"></i>
                    </div>
                    <input type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang') }}" required class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors placeholder-slate-400 shadow-inner font-medium" placeholder="Contoh: Beras Rojolele 5Kg">
                </div>
            </div>

            <!-- Deskripsi Barang -->
            <div>
                <label for="deskripsi" class="block text-sm font-bold text-slate-700 mb-2 ml-1">Deskripsi / Informasi Produk <span class="text-slate-400 font-normal text-xs ml-2">Opsional</span></label>
                <div class="relative">
                    <div class="absolute top-3 left-0 pl-4 flex items-start pointer-events-none">
                        <i class="ph-fill ph-text-align-left text-indigo-500 text-lg"></i>
                    </div>
                    <textarea name="deskripsi" id="deskripsi" rows="3" class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors placeholder-slate-400 shadow-inner font-medium" placeholder="Tuliskan informasi atau deskripsi detail tentang produk ini...">{{ old('deskripsi') }}</textarea>
                </div>
            </div>

            <!-- Upload Gambar Produk (Baru ditambahkan) -->
            <div>
                <label for="gambar" class="block text-sm font-bold text-slate-700 mb-2 ml-1">Foto / Gambar Produk (Untuk Katalog) <span class="text-slate-400 font-normal text-xs ml-2">Opsional, format: jpg/png, max: 2MB</span></label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="ph-fill ph-image text-indigo-500 text-lg"></i>
                    </div>
                    <input type="file" name="gambar" id="gambar" accept="image/*" class="block w-full pl-11 pr-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-600 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors shadow-inner font-medium file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-100 file:text-indigo-700 hover:file:bg-indigo-200 cursor-pointer">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Harga Jual -->
                <div>
                    <label for="harga_jual" class="block text-sm font-bold text-slate-700 mb-2 ml-1">Harga Jual Toko <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-emerald-500 font-bold text-sm">
                            Rp
                        </div>
                        <input type="text" name="harga_jual" id="harga_jual" value="{{ old('harga_jual') }}" required class="block w-full pl-11 pr-4 py-3 bg-emerald-50 border border-emerald-100 text-emerald-800 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-colors placeholder-emerald-300 font-bold shadow-inner" placeholder="0" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, '.');">
                    </div>
                </div>

                <!-- Stok -->
                <div>
                    <label for="stok" class="block text-sm font-bold text-slate-700 mb-2 ml-1">Stok Awal <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph-fill ph-stack text-indigo-500 text-lg"></i>
                        </div>
                        <input type="number" name="stok" id="stok" value="{{ old('stok', 0) }}" required min="0" class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors placeholder-slate-400 shadow-inner font-bold" placeholder="0">
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-8 pt-6 border-t border-slate-100 flex justify-end space-x-3">
            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-xl shadow-lg shadow-indigo-200 hover:shadow-indigo-300 transform hover:-translate-y-0.5 transition-all text-sm font-bold flex items-center">
                <i class="ph-bold ph-floppy-disk mr-2 text-lg"></i> Simpan Barang
            </button>
        </div>
    </form>
</div>
@endsection
