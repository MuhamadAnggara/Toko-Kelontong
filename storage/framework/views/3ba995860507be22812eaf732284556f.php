<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Toko Kelontong</title>
    <!-- Tailwind Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: PLUS JAKARTA SANS -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #fafafa; }
        .hero-bg {
            background-image: linear-gradient(rgba(17, 24, 39, 0.8), rgba(17, 24, 39, 0.9)), url('<?php echo e(asset("bg_login.jpg")); ?>');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="antialiased text-slate-800">

    <!-- Header / Navbar -->
    <nav class="bg-white/80 backdrop-blur-lg border-b border-slate-200 sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <a href="<?php echo e(route('katalog')); ?>" class="flex items-center group">
                    <div class="w-12 h-12 bg-gradient-to-tr from-indigo-600 to-purple-600 text-white rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-200 mr-4 transform group-hover:-translate-y-1 transition-all">
                        <i class="ph-fill ph-storefront text-2xl"></i>
                    </div>
                    <span class="font-extrabold text-2xl tracking-tight text-slate-900 group-hover:text-indigo-600 transition-colors">Toko Kelontong</span>
                </a>
                <div class="flex items-center space-x-8">
                    <a href="<?php echo e(route('katalog')); ?>" class="text-slate-500 hover:text-indigo-600 font-semibold text-sm transition-colors hidden sm:flex items-center">
                        <i class="ph-bold ph-book-open mr-2 text-lg"></i> Katalog
                    </a>
                    <a href="<?php echo e(route('tentang-kami')); ?>" class="text-indigo-600 font-bold text-sm transition-colors hidden sm:flex items-center relative after:content-[''] after:absolute after:-bottom-7 after:left-0 after:w-full after:h-1 after:bg-indigo-600 after:rounded-t-lg">
                        <i class="ph-bold ph-info mr-2 text-lg"></i> Tentang Kami
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-bg relative overflow-hidden py-24 sm:py-32 flex items-center justify-center">
        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
            <span class="inline-block py-1.5 px-4 rounded-full bg-indigo-500/20 text-indigo-300 font-bold text-xs tracking-widest uppercase mb-4 border border-indigo-500/30 backdrop-blur-sm">Sejarah</span>
            <h1 class="text-4xl sm:text-6xl font-extrabold text-white tracking-tight mb-6 leading-tight">Mengenal Lebih Dekat <span class="text-white">Toko Kami</span></h1>
            <p class="text-lg sm:text-xl text-slate-300 font-medium mb-10 max-w-2xl mx-auto">Toko Kelontong telah hadir sejak Desember 2019 dengan visi memberikan kualitas bahan pangan rumahan yang terbaik, praktis, dan merakyat.</p>
        </div>
    </div>

        <!-- Sejarah Kami Content -->
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 relative z-20 pb-20">
            <div class="bg-white rounded-3xl p-8 md:p-12 shadow-2xl shadow-slate-200/50 border border-slate-100 mb-12">
                <div class="prose prose-slate prose-lg md:prose-xl max-w-none text-slate-600 leading-relaxed space-y-6">
                    <p class="font-medium text-xl md:text-2xl text-slate-800 leading-snug">
                        Berdiri sejak bulan Desember tahun 2019, tepat sebelum masa pandemi, <strong class="text-indigo-600">Toko Kelontong</strong> kami bermula dari sebuah warung kecil di sudut jalan yang didorong oleh semangat untuk memenuhi kebutuhan harian warga sekitar.
                    </p>
                    <p>
                        Awalnya kami hanya menjual bahan pokok sederhana seperti beras, gula, dan minyak. Namun seiring berjalannya waktu dan dukungan penuh dari para pelanggan setia, Toko Kelontong perlahan tumbuh dan memperluas variasi produk. Mulai dari sembako, minuman segar, hingga perlengkapan kebersihan rumah tangga, semuanya kini tersedia.
                    </p>
                    <p>
                        Filosofi kami tidak pernah berubah sejak hari pertama: <strong>"Mengedepankan harga bersahabat, kualitas terbaik, dan senyum keceriaan setiap kali Anda datang."</strong> Kami percaya bahwa sebuah toko kelontong bukan hanya tempat transaksi jual-beli, melainkan pusat interaksi sosial yang hangat bagi warga di lingkungan sekitar.
                    </p>
                    <p>
                        Kini, untuk memudahkan pelayanan di era digital, kami telah menghadirkan <strong class="text-indigo-500">Katalog Online</strong> ini agar pelanggan dapat dengan mudah memeriksa ketersediaan dan harga barang dari rumah, hingga memesannya secara kilat menggunakan WhatsApp.
                    </p>
                </div>
            </div>

            <!-- Visi Misi Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                <div class="bg-gradient-to-br from-indigo-50 to-white p-8 rounded-3xl border border-indigo-100 shadow-lg shadow-indigo-100/50 hover:-translate-y-1 transition-transform">
                    <div class="w-14 h-14 bg-indigo-600 text-white rounded-2xl flex items-center justify-center mb-6 shadow-md shadow-indigo-200">
                        <i class="ph-bold ph-eye text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-4">Visi Kami</h3>
                    <p class="text-slate-600">Menjadi pusat perbelanjaan kebutuhan pokok nomor satu di hati warga, yang tidak hanya lengkap dan terjangkau, namun juga modern serta adaptif terhadap teknologi bagi kemudahan pelanggan.</p>
                </div>
                
                <div class="bg-gradient-to-br from-purple-50 to-white p-8 rounded-3xl border border-purple-100 shadow-lg shadow-purple-100/50 hover:-translate-y-1 transition-transform">
                    <div class="w-14 h-14 bg-purple-600 text-white rounded-2xl flex items-center justify-center mb-6 shadow-md shadow-purple-200">
                        <i class="ph-bold ph-rocket text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-4">Misi Kami</h3>
                    <ul class="text-slate-600 space-y-3">
                        <li class="flex items-start"><i class="ph-bold ph-check text-emerald-500 mt-1 mr-3 text-lg"></i>Menyediakan barang dengan kualitas segar dan terjamin.</li>
                        <li class="flex items-start"><i class="ph-bold ph-check text-emerald-500 mt-1 mr-3 text-lg"></i>Memberikan harga grosir maupun eceran yang adil dan kompetitif.</li>
                        <li class="flex items-start"><i class="ph-bold ph-check text-emerald-500 mt-1 mr-3 text-lg"></i>Hadir dengan pelayanan yang ramah, cepat, dan kekeluargaan.</li>
                    </ul>
                </div>
            </div>

            <div class="text-center mt-12">
                <h3 class="font-extrabold text-2xl text-slate-800 mb-4">Mari Mampir ke Toko Kami!</h3>
                <p class="text-slate-500 mb-8 max-w-lg mx-auto">Kami siap melayani setiap kebutuhan daput dan rumah tanggamu. Jangan ragu memanggil kasir dan bertanya jika ada barang yang sulit ditemukan.</p>
                <a href="<?php echo e(route('katalog')); ?>" class="px-8 py-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl shadow-xl shadow-indigo-200 hover:-translate-y-1 transition-all inline-flex items-center font-bold text-lg">
                    <i class="ph-bold ph-shopping-bag mr-3 text-2xl"></i> Mulai Belanja Sekarang
                </a>
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
                    <p class="text-slate-500 text-sm font-semibold">&copy; <?php echo e(date('Y')); ?> Sistem Toko Kelontong</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
<?php /**PATH C:\laragon\www\toko-kelontong\resources\views/tentang-kami.blade.php ENDPATH**/ ?>