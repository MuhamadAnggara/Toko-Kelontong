<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk - Toko Kelontong</title>
    <!-- Tailwind Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: PLUS JAKARTA SANS -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #fafafa; }
        .hero-bg {
            background-image: linear-gradient(rgba(17, 24, 39, 0.7), rgba(17, 24, 39, 0.8)), url('{{ asset("bg_login.jpg") }}');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="antialiased text-slate-800">

    <!-- Header / Navbar -->
    <nav class="bg-white/80 backdrop-blur-lg border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <a href="{{ route('katalog') }}" class="flex items-center group">
                    <div class="w-12 h-12 bg-gradient-to-tr from-indigo-600 to-purple-600 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-200 mr-4 transform group-hover:-translate-y-1 transition-all">
                        <i class="ph-fill ph-storefront text-2xl"></i>
                    </div>
                    <span class="font-extrabold text-2xl tracking-tight text-slate-900 group-hover:text-indigo-600 transition-colors">Toko Kelontong</span>
                </a>
                <div class="flex items-center space-x-8">
                    <a href="{{ route('katalog') }}" class="text-indigo-600 font-bold text-sm transition-colors hidden sm:flex items-center relative after:content-[''] after:absolute after:-bottom-7 after:left-0 after:w-full after:h-1 after:bg-indigo-600 after:rounded-t-lg">
                        <i class="ph-bold ph-book-open mr-2 text-lg"></i> Katalog
                    </a>
                    <a href="{{ route('tentang-kami') }}" class="text-slate-500 hover:text-indigo-600 font-semibold text-sm transition-colors hidden sm:flex items-center">
                        <i class="ph-bold ph-info mr-2 text-lg"></i> Tentang Kami
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-bg relative overflow-hidden py-24 sm:py-32 flex items-center justify-center">
        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
            <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight mb-6 leading-tight">Belanja Kebutuhan <span class="text-white">Sehari-hari</span> Lebih Mudah</h1>
            <p class="text-lg sm:text-xl text-slate-300 font-medium mb-10 max-w-2xl mx-auto">Lihat katalog stok barang terbaru kami. Harga bersahabat, kualitas terjamin. Kunjungi toko offline kami sekarang juga!</p>
            
            <!-- Search Bar -->
            <form action="{{ route('katalog') }}" method="GET" class="max-w-xl mx-auto relative bg-white rounded-2xl shadow-2xl p-2 flex items-center">
                <i class="ph-bold ph-magnifying-glass text-slate-400 text-xl ml-4"></i>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama barang, misal: Beras, Indomie..." class="w-full py-3 px-4 outline-none text-slate-700 font-medium bg-transparent">
                <button type="submit" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold transition shadow-md">Cari</button>
            </form>
        </div>
    </div>

    <!-- Product Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="flex justify-between items-end mb-10">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900 mb-2">Semua Produk</h2>
                <p class="text-slate-500 font-medium text-lg">Katalog item yang tersedia di toko kami hari ini.</p>
            </div>
            
            <div class="hidden sm:flex space-x-2">
                <button class="px-4 py-2 border border-slate-200 text-slate-700 bg-white rounded-full text-sm font-bold shadow-sm hover:border-indigo-500 transition">Semua</button>
                <button class="px-4 py-2 border border-transparent text-slate-500 hover:text-slate-800 rounded-full text-sm font-semibold transition">Sembako</button>
                <button class="px-4 py-2 border border-transparent text-slate-500 hover:text-slate-800 rounded-full text-sm font-semibold transition">Minuman</button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @forelse($barangs as $b)
                <!-- Product Card -->
                <div class="bg-white rounded-3xl border border-slate-100 overflow-hidden shadow-[0_4px_20px_rgb(0,0,0,0.03)] hover:shadow-[0_10px_40px_rgb(99,102,241,0.1)] hover:-translate-y-1 transition-all duration-300 group flex flex-col">
                    <!-- Image -->
                    <div class="aspect-[4/3] bg-slate-100 relative overflow-hidden flex-shrink-0">
                        @if($b->gambar)
                            <img src="{{ asset('storage/' . $b->gambar) }}" alt="{{ $b->nama_barang }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @else
                            <div class="flex items-center justify-center w-full h-full text-slate-300">
                                <i class="ph-fill ph-package text-6xl"></i>
                            </div>
                        @endif
                        
                        <!-- Badges -->
                        <div class="absolute top-4 left-4">
                            <span class="bg-white/90 backdrop-blur-sm text-slate-800 text-xs font-bold px-3 py-1.5 rounded-full shadow-sm">
                                {{ $b->kategori->nama_kategori ?? 'Umum' }}
                            </span>
                        </div>
                        
                        @if($b->stok < 1)
                            <div class="absolute inset-0 bg-white/60 backdrop-blur-[2px] flex items-center justify-center">
                                <span class="bg-rose-500 text-white font-bold py-2 px-6 rounded-full shadow-lg transform -rotate-12 text-lg border-2 border-white">STOK HABIS</span>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Content -->
                    <div class="p-6 flex-1 flex flex-col">
                        <div class="text-xs font-mono text-slate-400 mb-2">{{ $b->kode_barang }}</div>
                        <h3 class="font-extrabold text-lg text-slate-800 mb-2 line-clamp-2 leading-tight">{{ $b->nama_barang }}</h3>
                        
                        @if($b->deskripsi)
                            <p class="text-sm text-slate-500 mb-4 line-clamp-3 flex-1">{{ $b->deskripsi }}</p>
                        @else
                            <div class="flex-1"></div>
                        @endif
                        
                        <div class="mt-4 pt-4 border-t border-slate-100 flex items-end justify-between mb-4">
                            <div>
                                <p class="text-xs text-slate-500 font-medium mb-1">Harga Jual</p>
                                <p class="font-extrabold text-indigo-600 text-xl">Rp{{ number_format($b->harga_jual,0,',','.') }}</p>
                            </div>
                            <div class="text-right">
                                @if($b->stok > 0)
                                    <span class="bg-emerald-50 text-emerald-600 border border-emerald-200 text-xs font-bold px-2.5 py-1 rounded-lg flex items-center">
                                        <i class="ph-fill ph-check-circle mr-1"></i> Stok: {{ $b->stok }}
                                    </span>
                                @else
                                    <span class="bg-rose-50 text-rose-600 border border-rose-200 text-xs font-bold px-2.5 py-1 rounded-lg flex items-center">
                                        <i class="ph-fill ph-x-circle mr-1"></i> Habis
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Tombol Beli -->
                        @if($b->stok > 0)
                        <a href="https://wa.me/6282246258819?text=Halo%20Toko%20Kelontong,%20saya%20ingin%20membeli%20produk:%20{{ rawurlencode($b->nama_barang) }}%20({{ $b->kode_barang }})" target="_blank" class="w-full mt-auto bg-slate-50 hover:bg-emerald-50 text-slate-700 hover:text-emerald-600 border border-slate-200 hover:border-emerald-300 transition-colors duration-300 rounded-xl py-2.5 font-bold text-sm flex items-center justify-center group/btn">
                            <i class="ph-bold ph-whatsapp-logo text-lg mr-2 text-slate-400 group-hover/btn:text-emerald-500 transition-colors"></i> Pesan via WhatsApp
                        </a>
                        @else
                        <button disabled class="w-full mt-auto bg-slate-50 text-slate-400 border border-slate-100 rounded-xl py-2.5 font-bold text-sm flex items-center justify-center cursor-not-allowed">
                            Stok Habis
                        </button>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center">
                    <div class="w-24 h-24 bg-slate-100 text-slate-300 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="ph-fill ph-storefront text-5xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-2">Toko Masih Kosong</h3>
                    <p class="text-slate-500 text-lg">Belum ada barang yang didaftarkan di katalog kami.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-slate-900 border-t border-slate-800 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="w-12 h-12 bg-white/10 text-white rounded-xl flex items-center justify-center mx-auto mb-6 border border-white/20">
                    <i class="ph-fill ph-storefront text-xl"></i>
                </div>
                <h2 class="text-2xl font-extrabold text-white mb-2">Toko Kelontong</h2>
                <p class="text-slate-400 max-w-md mx-auto mb-8 font-medium">Tempat terbaik melengkapi kebutuhan harian. Kunjungi offline store kami untuk bertransaksi langsung dengan kasir kami.</p>
                <div class="pt-8 border-t border-slate-800 flex items-center justify-center">
                    <p class="text-slate-500 text-sm font-semibold">&copy; {{ date('Y') }} Sistem Toko Kelontong</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
