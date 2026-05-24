<?php $__env->startSection('header', 'Data Kasir'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 pb-4 border-b border-slate-100">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-800">Manajemen Kasir & Karyawan</h2>
            <p class="text-slate-500 text-sm mt-1">Kelola data personal dan akses akun kasir</p>
        </div>
        <a href="<?php echo e(route('kasir.create')); ?>" class="mt-4 sm:mt-0 flex items-center px-5 py-2.5 bg-gradient-to-r from-sky-500 to-blue-600 text-white rounded-xl shadow-lg shadow-sky-200 hover:shadow-sky-300 transform hover:-translate-y-0.5 transition-all text-sm font-bold">
            <i class="ph-bold ph-user-plus mr-2 text-lg"></i> Tambah Kasir
        </a>
    </div>

    <!-- Beautiful Table -->
    <div class="overflow-x-auto rounded-2xl border border-slate-200/60 shadow-sm">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 text-xs uppercase tracking-wider font-bold">
                    <th class="py-4 px-6 rounded-tl-2xl">Kasir ID</th>
                    <th class="py-4 px-6">Nama Lengkap</th>
                    <th class="py-4 px-6">Username</th>
                    <th class="py-4 px-6 text-center">Status</th>
                    <th class="py-4 px-6 text-right rounded-tr-2xl">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm text-slate-700 font-medium">
                <?php $__empty_1 = true; $__currentLoopData = $kasirs ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ksr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-blue-50/30 transition-colors group">
                    <td class="py-4 px-6 text-blue-600 font-bold font-mono">USR-<?php echo e(str_pad($ksr->id, 4, '0', STR_PAD_LEFT)); ?></td>
                    <td class="py-4 px-6">
                        <div class="flex items-center">
                            <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($ksr->name)); ?>&background=e0f2fe&color=0369a1&rounded=true&bold=true" class="w-10 h-10 shadow-sm mr-3 rounded-full" alt="">
                            <span class="font-bold text-slate-800"><?php echo e($ksr->name); ?></span>
                        </div>
                    </td>
                    <td class="py-4 px-6">
                        <div class="text-slate-500 font-medium text-xs">{{ $ksr->username }}</div>
                    </td>
                    <td class="py-4 px-6 text-center">
                        <span class="bg-emerald-50 text-emerald-600 border border-emerald-100 py-1.5 px-3 rounded-lg text-xs font-bold shadow-sm inline-flex items-center">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5 animate-pulse"></span> Aktif
                        </span>
                    </td>
                    <td class="py-4 px-6 text-right">
                         <div class="flex items-center justify-end space-x-2">
                            <a href="<?php echo e(route('kasir.edit', $ksr->id)); ?>" class="w-8 h-8 rounded-xl bg-slate-100 text-slate-500 hover:bg-sky-100 hover:text-sky-600 flex items-center justify-center transition-colors shadow-sm">
                                <i class="ph-bold ph-pencil-simple"></i>
                            </a>
                            <form action="<?php echo e(route('kasir.destroy', $ksr->id)); ?>" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus kasir ini?');">
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
                    <td colspan="5" class="py-12 px-6 text-center text-slate-400">
                        <i class="ph-fill ph-users text-5xl mb-3 text-slate-300"></i>
                        <p class="font-semibold text-lg">Belum ada kasir terdaftar.</p>
                        <p class="text-sm mt-1">Tambahkan akun kasir untuk menangani penjualan toko.</p>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\toko-kelontong\resources\views/kasir/index.blade.php ENDPATH**/ ?>