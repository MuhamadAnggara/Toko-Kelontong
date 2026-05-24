<?php $__env->startSection('header', 'Laporan Penjualan Toko'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 flex flex-col h-full overflow-hidden fade-in">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-800 tracking-tight">Riwayat Transaksi</h2>
            <p class="text-slate-500 font-medium mt-1">Daftar seluruh transaksi yang berhasil dari mesin kasir.</p>
        </div>
        
        <div class="flex space-x-3">
            <a href="<?php echo e(route('laporan.excel')); ?>" class="px-5 py-2.5 bg-emerald-50 text-emerald-600 font-bold rounded-xl border border-emerald-100/50 hover:bg-emerald-100 transition shadow-sm flex items-center">
                <i class="ph-bold ph-microsoft-excel-logo mr-2 text-lg"></i> Export Excel
            </a>
            <a href="<?php echo e(route('laporan.pdf')); ?>" target="_blank" class="px-5 py-2.5 bg-slate-900 text-white font-bold rounded-xl shadow-md shadow-slate-900/20 hover:bg-slate-800 transition flex items-center">
                <i class="ph-bold ph-printer mr-2 text-lg"></i> Cetak PDF
            </a>
        </div>
    </div>

    <!-- Tabel Data -->
    <div class="bg-white rounded-2xl border border-slate-200/60 overflow-hidden shadow-sm flex-1 flex flex-col">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-200/60 text-slate-500 text-sm">
                        <th class="py-4 px-6 font-bold uppercase tracking-wider">Tanggal</th>
                        <th class="py-4 px-6 font-bold uppercase tracking-wider">No Nota</th>
                        <th class="py-4 px-6 font-bold uppercase tracking-wider">Kasir</th>
                        <th class="py-4 px-6 font-bold uppercase tracking-wider">Metode</th>
                        <th class="py-4 px-6 font-bold uppercase tracking-wider text-right">Total Belanja</th>
                        <th class="py-4 px-6 font-bold uppercase tracking-wider text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php $__empty_1 = true; $__currentLoopData = $transaksis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-indigo-50/30 transition-colors group cursor-pointer group-hover">
                        <td class="py-5 px-6">
                            <span class="font-bold text-slate-800"><?php echo e($t->created_at->format('d M Y')); ?></span>
                            <span class="text-xs text-slate-400 block mt-0.5"><?php echo e($t->created_at->format('H:i')); ?> WIB</span>
                        </td>
                        <td class="py-5 px-6">
                            <span class="px-3 py-1 bg-slate-100 text-slate-600 font-bold text-xs rounded-lg border border-slate-200"><?php echo e($t->no_nota); ?></span>
                        </td>
                        <td class="py-5 px-6">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-xs mr-3 shadow-inner">
                                    <?php echo e(substr($t->user->name, 0, 1)); ?>

                                </div>
                                <span class="font-semibold text-slate-700"><?php echo e($t->user->name); ?></span>
                            </div>
                        </td>
                        <td class="py-5 px-6">
                            <span class="px-3 py-1 font-bold text-xs rounded-lg <?php echo e($t->metode_pembayaran == 'Tunai' ? 'bg-indigo-50 text-indigo-600 border border-indigo-100' : 'bg-emerald-50 text-emerald-600 border border-emerald-100'); ?>">
                                <?php echo e($t->metode_pembayaran); ?>

                            </span>
                        </td>
                        <td class="py-5 px-6 text-right">
                            <span class="font-black text-slate-800">Rp <?php echo e(number_format($t->total_harga, 0, ',', '.')); ?></span>
                        </td>
                        <td class="py-5 px-6 text-center">
                            <a href="<?php echo e(route('cetak.struk', $t->id)); ?>" target="_blank" class="inline-flex w-8 h-8 items-center justify-center rounded-lg bg-slate-100 text-slate-500 hover:bg-white hover:text-indigo-600 hover:shadow-md transition-all border border-transparent hover:border-indigo-100 tooltip cursor-pointer" title="Cetak Ulang Struk">
                                <i class="ph-bold ph-printer text-lg"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="py-12 text-center">
                            <div class="w-24 h-24 bg-slate-50 text-slate-300 rounded-full flex items-center justify-center mx-auto mb-4 scale-75">
                                <i class="ph-fill ph-receipt text-5xl"></i>
                            </div>
                            <h3 class="text-lg font-bold text-slate-700 mb-1">Belum Ada Transaksi</h3>
                            <p class="text-slate-500 font-medium">Data penjualan akan muncul di sini setelah kasir melakukan transaksi.</p>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\toko-kelontong\resources\views/laporan/index.blade.php ENDPATH**/ ?>