<?php $__env->startSection('header', 'Tambah Kasir'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100">
    <div class="mb-8 pb-4 border-b border-slate-100 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-800">Kasir / Karyawan Baru</h2>
            <p class="text-slate-500 text-sm mt-1">Daftarkan akun kasir untuk mengakses sistem penjualan</p>
        </div>
        <a href="<?php echo e(route('kasir.index')); ?>" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl font-bold text-sm transition-colors flex items-center shadow-sm">
            <i class="ph-bold ph-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    <?php if($errors->any()): ?>
        <div class="mb-6 bg-rose-50 border border-rose-200 text-rose-600 px-4 py-3 rounded-xl flex items-start shadow-sm">
            <i class="ph-fill ph-warning-circle text-xl mr-3 mt-0.5"></i>
            <ul class="text-sm font-medium space-y-1">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('kasir.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-bold text-slate-700 mb-2 ml-1">Nama Lengkap <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph-fill ph-user-circle text-sky-500 text-lg"></i>
                        </div>
                        <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" required class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-colors placeholder-slate-400 shadow-inner font-medium" placeholder="Nama karyawan">
                    </div>
                </div>

                <div>
                    <label for="username" class="block text-sm font-bold text-slate-700 mb-2 ml-1">Username Login <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph-fill ph-identification-badge text-sky-500 text-lg"></i>
                        </div>
                        <input type="text" name="username" id="username" value="<?php echo e(old('username')); ?>" required class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-colors placeholder-slate-400 shadow-inner font-medium" placeholder="kasir_01">
                    </div>
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-bold text-slate-700 mb-2 ml-1">Sandi Akses (Password) <span class="text-rose-500">*</span></label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <i class="ph-fill ph-lock-key text-sky-500 text-lg"></i>
                    </div>
                    <input type="password" name="password" id="password" required minlength="6" class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-colors placeholder-slate-400 shadow-inner font-medium" placeholder="Minimal 6 karakter">
                </div>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-slate-100 flex justify-end space-x-3">
            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-sky-500 to-blue-600 text-white rounded-xl shadow-lg shadow-sky-200 hover:shadow-sky-300 transform hover:-translate-y-0.5 transition-all text-sm font-bold flex items-center">
                <i class="ph-bold ph-floppy-disk mr-2 text-lg"></i> Daftarkan Kasir
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\toko-kelontong\resources\views/kasir/create.blade.php ENDPATH**/ ?>