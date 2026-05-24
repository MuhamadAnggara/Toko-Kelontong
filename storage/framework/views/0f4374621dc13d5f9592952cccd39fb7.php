

<?php $__env->startSection('header', 'Dashboard Owner (Ringkasan Eksekutif)'); ?>

<?php $__env->startSection('content'); ?>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Card Pendapatan -->
    <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-3xl p-6 shadow-xl relative overflow-hidden group hover:-translate-y-1 transition-all duration-300 border border-indigo-400/30">
        <div class="absolute right-0 top-0 -mr-6 -mt-6 w-24 h-24 rounded-full bg-white opacity-10 group-hover:scale-150 transition-transform duration-500"></div>
        <div class="flex items-start justify-between relative z-10 text-white">
            <div>
                <p class="text-sm font-semibold opacity-80 uppercase tracking-widest mb-1">Total Pendapatan</p>
                <h3 class="text-4xl font-extrabold"><?php echo e($total_pendapatan ?? 'Rp 0'); ?></h3>
                <p class="text-xs font-medium mt-2 flex items-center bg-white/20 px-2 py-1 rounded-lg w-fit">
                    <i class="ph-bold ph-receipt mr-1 text-sm"></i> Berdasarkan seluruh transaksi
                </p>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center shadow-inner">
                <i class="ph-fill ph-wallet text-3xl"></i>
            </div>
        </div>
    </div>

    <!-- Card Top Produk -->
    <div class="bg-white rounded-3xl p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 relative overflow-hidden group hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
        <div class="absolute right-0 top-0 -mr-6 -mt-6 w-24 h-24 rounded-full bg-amber-50 opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
        <div class="flex items-start justify-between relative z-10">
            <div>
                <p class="text-sm font-semibold text-slate-400 uppercase tracking-widest mb-1">Top Produk</p>
                <h3 class="text-2xl font-extrabold text-slate-800 line-clamp-1"><?php echo e($barang_terlaris ?? '-'); ?></h3>
                <p class="text-xs text-amber-500 font-medium mt-2 flex items-center bg-amber-50 px-2 py-1 rounded-lg w-fit">
                    <i class="ph-bold ph-fire mr-1 text-sm"></i> Paling laris minggu ini
                </p>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-amber-500 text-white flex items-center justify-center shadow-lg shadow-amber-200">
                <i class="ph-fill ph-star text-3xl"></i>
            </div>
        </div>
    </div>

    <!-- Card Total Stok -->
    <div class="bg-white rounded-3xl p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 relative overflow-hidden group hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
        <div class="absolute right-0 top-0 -mr-6 -mt-6 w-24 h-24 rounded-full bg-emerald-50 opacity-50 group-hover:scale-150 transition-transform duration-500"></div>
        <div class="flex items-start justify-between relative z-10">
            <div>
                <p class="text-sm font-semibold text-slate-400 uppercase tracking-widest mb-1">Total Stok Global</p>
                <h3 class="text-4xl font-extrabold text-slate-800"><?php echo e($total_stok ?? 0); ?></h3>
                <p class="text-xs text-emerald-500 font-medium mt-2 flex items-center bg-emerald-50 px-2 py-1 rounded-lg w-fit">
                    <i class="ph-bold ph-check-circle mr-1 text-sm"></i> Masih aman
                </p>
            </div>
            <div class="w-14 h-14 rounded-2xl bg-emerald-500 text-white flex items-center justify-center shadow-lg shadow-emerald-200">
                <i class="ph-fill ph-stack text-3xl"></i>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Grafik Penjualan Placeholder -->
    <div class="bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 flex flex-col">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h4 class="text-lg font-bold text-slate-800">Grafik Penjualan</h4>
                <p class="text-sm text-slate-500">Pergerakan transaksi 7 hari terakhir</p>
            </div>
            <button class="w-8 h-8 flex justify-center items-center rounded-lg bg-slate-50 hover:bg-slate-100 text-slate-400 transition">
                <i class="ph ph-dots-three-outline-vertical"></i>
            </button>
        </div>
        
        <div class="flex-1 bg-white rounded-2xl border border-slate-100 min-h-[250px] relative overflow-hidden p-6 gap-2 flex items-end justify-between mt-4">
            <?php $__currentLoopData = $grafik; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $tinggi = ($g['total'] / $max_grafik) * 100; if($tinggi < 5) $tinggi = 5; ?>
            <div class="flex flex-col items-center justify-end h-full w-full group">
                <div class="relative w-full px-1">
                    <div class="bg-indigo-500 rounded-t-xl group-hover:bg-indigo-400 transition-colors shadow-sm w-full relative" style="height: <?php echo e($tinggi); ?>%; min-height: 10px;">
                        <!-- Tooltip -->
                        <div class="absolute -top-10 left-1/2 -translate-x-1/2 bg-slate-800 text-white text-[10px] py-1 px-2 font-bold rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none whitespace-nowrap">
                            Rp <?php echo e(number_format($g['total'], 0, ',', '.')); ?>

                        </div>
                    </div>
                </div>
                <p class="text-[10px] font-bold text-slate-400 mt-2"><?php echo e($g['tanggal']); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <!-- Riwayat Transaksi Global -->
    <div class="bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 flex flex-col">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h4 class="text-lg font-bold text-slate-800">Transaksi Terbaru</h4>
                <p class="text-sm text-slate-500">Pantau transaksi kasir secara real-time</p>
            </div>
            <a href="#" class="text-indigo-600 font-semibold text-sm hover:underline">Lihat Semua</a>
        </div>
        
        <div class="space-y-4 flex-1">
            <?php $__empty_1 = true; $__currentLoopData = $transaksi_terbaru; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="flex items-center p-3 hover:bg-slate-50 rounded-xl transition cursor-pointer border border-transparent hover:border-slate-100">
                <div class="w-10 h-10 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center mr-4 border border-indigo-100/50">
                    <i class="ph-bold ph-receipt text-lg"></i>
                </div>
                <div class="flex-1 overflow-hidden">
                    <p class="font-bold text-slate-800 text-sm truncate"><?php echo e($t->no_nota); ?></p>
                    <p class="text-xs text-slate-500 mt-0.5">Kasir: <?php echo e($t->user->name ?? 'Kasir M'); ?> • <?php echo e($t->details->sum('qty')); ?> item</p>
                </div>
                <div class="text-right">
                    <p class="font-extrabold text-slate-800 tracking-tight">Rp<?php echo e(number_format($t->total_harga, 0, ',', '.')); ?></p>
                    <p class="text-[10px] text-slate-400 mt-0.5 font-medium"><?php echo e($t->created_at->diffForHumans()); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center py-6">
                <i class="ph-fill ph-receipt text-3xl text-slate-300 mb-2"></i>
                <p class="text-slate-500 text-sm font-medium">Belum ada transaksi sama sekali.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\toko-kelontong\resources\views/owner/dashboard.blade.php ENDPATH**/ ?>