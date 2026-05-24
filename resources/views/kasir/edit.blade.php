@extends('layouts.app')

@section('header', 'Edit Kasir')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100">
    <div class="mb-8 pb-4 border-b border-slate-100 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-800">Ubah Data Kasir</h2>
            <p class="text-slate-500 text-sm mt-1">Perbarui profil dan kontak akun kasir</p>
        </div>
        <a href="{{ route('kasir.index') }}" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl font-bold text-sm transition-colors flex items-center shadow-sm">
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

    <form action="{{ route('kasir.update', $kasir->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-bold text-slate-700 mb-2 ml-1">Nama Lengkap <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph-fill ph-user-circle text-sky-500 text-lg"></i>
                        </div>
                        <input type="text" name="name" id="name" value="{{ old('name', $kasir->name) }}" required class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-colors placeholder-slate-400 shadow-inner font-medium">
                    </div>
                </div>

                <div>
                    <label for="username" class="block text-sm font-bold text-slate-700 mb-2 ml-1">Username Login <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph-fill ph-identification-badge text-sky-500 text-lg"></i>
                        </div>
                        <input type="text" name="username" id="username" value="{{ old('username', $kasir->username) }}" required class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-colors placeholder-slate-400 shadow-inner font-medium">
                    </div>
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-bold text-slate-700 mb-2 ml-1">Sandi Akses Baru (Opsional)</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="ph-fill ph-lock-key text-sky-500 text-lg"></i>
                    </div>
                    <input type="password" name="password" id="password" minlength="6" class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-colors placeholder-slate-400 shadow-inner font-medium" placeholder="Kosongi jika tidak ingin diubah">
                </div>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-slate-100 flex justify-end space-x-3">
            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-sky-500 to-blue-600 text-white rounded-xl shadow-lg shadow-sky-200 hover:shadow-sky-300 transform hover:-translate-y-0.5 transition-all text-sm font-bold flex items-center">
                <i class="ph-bold ph-floppy-disk mr-2 text-lg"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
