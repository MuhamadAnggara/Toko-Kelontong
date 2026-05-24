<?php $__env->startSection('header', 'Data Barang'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 pb-4 border-b border-slate-100">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-800">Manajemen Inventori Utama</h2>
            <p class="text-slate-500 text-sm mt-1">Kelola stok, harga, dan ketersediaan barang di toko</p>
        </div>
        <a href="<?php echo e(route('barang.create')); ?>" class="mt-4 sm:mt-0 flex items-center px-5 py-2.5 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-xl shadow-lg shadow-indigo-200 hover:shadow-indigo-300 transform hover:-translate-y-0.5 transition-all text-sm font-bold">
            <i class="ph-bold ph-plus-circle mr-2 text-lg"></i> Tambah Barang
        </a>
    </div>

    <!-- Toolbar / Filter / Search -->
    <div class="flex flex-col sm:flex-row gap-4 mb-6">
        <div class="relative flex-1">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <i class="ph-bold ph-magnifying-glass text-slate-400"></i>
            </div>
            <input type="text" class="block w-full pl-11 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm transition-colors shadow-inner" placeholder="Cari nama barang atau kode sku...">
        </div>
        <div class="flex gap-2">
            <button class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-xl hover:bg-slate-50 transition shadow-sm font-medium text-sm flex items-center">
                <i class="ph-bold ph-funnel mr-2"></i> Filter
            </button>
            <button class="px-4 py-2 bg-white border border-slate-200 text-slate-600 rounded-xl hover:bg-slate-50 transition shadow-sm font-medium text-sm flex items-center">
                <i class="ph-bold ph-export mr-2"></i> Export
            </button>
        </div>
    </div>

    <!-- Beautiful Table -->
    <div class="overflow-x-auto rounded-2xl border border-slate-200/60 shadow-sm">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 text-xs uppercase tracking-wider font-bold">
                    <th class="py-4 px-6 rounded-tl-2xl">Kode Barang</th>
                    <th class="py-4 px-6">Nama Barang</th>
                    <th class="py-4 px-6">Kategori</th>
                    <th class="py-4 px-6">Harga Jual</th>
                    <th class="py-4 px-6 text-center">Stok Sisa</th>
                    <th class="py-4 px-6 text-right rounded-tr-2xl">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm text-slate-700 font-medium">
                <?php $__empty_1 = true; $__currentLoopData = $barangs ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-indigo-50/30 transition-colors group">
                    <td class="py-4 px-6 text-indigo-600 font-bold font-mono"><?php echo e($b->kode_barang); ?></td>
                    <td class="py-4 px-6">
                        <div class="flex items-center">
                            <?php if($b->gambar): ?>
                                <img src="<?php echo e(asset('storage/' . $b->gambar)); ?>" alt="<?php echo e($b->nama_barang); ?>" class="w-10 h-10 object-cover rounded-xl border border-slate-200 mr-3 shrink-0 shadow-sm">
                            <?php else: ?>
                                <div class="w-10 h-10 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center mr-3 text-slate-400 shrink-0 shadow-sm">
                                    <i class="ph-fill ph-package text-xl"></i>
                                </div>
                            <?php endif; ?>
                            <span class="font-bold text-slate-800"><?php echo e($b->nama_barang); ?></span>
                        </div>
                    </td>
                    <td class="py-4 px-6">
                        <span class="bg-slate-100 text-slate-600 py-1 px-3 rounded-full text-xs font-semibold"><?php echo e($b->kategori->nama_kategori ?? '-'); ?></span>
                    </td>
                    <td class="py-4 px-6 text-emerald-600 font-bold">Rp<?php echo e(number_format($b->harga_jual,0,',','.')); ?></td>
                    <td class="py-4 px-6 text-center">
                        <span class="inline-flex items-center justify-center min-w-[3rem] px-2 py-1 rounded-lg <?php echo e($b->stok < 10 ? 'bg-rose-100 text-rose-700' : 'bg-emerald-100 text-emerald-700'); ?> font-extrabold shadow-sm border <?php echo e($b->stok < 10 ? 'border-rose-200' : 'border-emerald-200'); ?>">
                            <?php echo e($b->stok); ?>

                        </span>
                    </td>
                    <td class="py-4 px-6 text-right">
                        <div class="flex items-center justify-end space-x-2">
                            <a href="<?php echo e(route('barang.edit', $b->id)); ?>" class="w-8 h-8 rounded-xl bg-slate-100 text-slate-500 hover:bg-indigo-100 hover:text-indigo-600 flex items-center justify-center transition-colors shadow-sm">
                                <i class="ph-bold ph-pencil-simple"></i>
                            </a>
                            <form action="<?php echo e(route('barang.destroy', $b->id)); ?>" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus barang ini?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="w-8 h-8 rounded-xl bg-slate-100 text-slate-500 hover:bg-rose-100 hover:text-rose-600 flex items-center justify-center transition-colors shadow-sm">
                                    <i class="ph-bold ph-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="7" class="py-12 px-6 text-center text-slate-400">
                        <i class="ph-fill ph-package text-5xl mb-3 text-slate-300"></i>
                        <p class="font-semibold text-lg">Belum ada data barang.</p>
                        <p class="text-sm mt-1">Silakan tambahkan barang baru ke inventory Anda.</p>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\toko-kelontong\resources\views/barang/index.blade.php ENDPATH**/ ?>