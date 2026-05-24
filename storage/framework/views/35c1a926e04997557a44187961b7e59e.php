

<?php $__env->startSection('header', 'Input Transaksi Barang Masuk'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto mt-6">
    <div class="bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 flex flex-col h-full overflow-hidden fade-in">
        
        <div class="flex items-center mb-8 border-b border-slate-200/60 pb-5">
            <a href="<?php echo e(route('barang-masuk.index')); ?>" class="w-10 h-10 bg-slate-100 text-slate-500 rounded-xl flex items-center justify-center hover:bg-slate-200 hover:text-slate-700 transition mr-4">
                <i class="ph-bold ph-arrow-left text-lg"></i>
            </a>
            <div>
                <h2 class="text-2xl font-extrabold text-slate-800 tracking-tight">Formulir Stok Masuk</h2>
                <p class="text-slate-500 font-medium mt-1 text-sm">Pilih barang dan tambahkan jumlah stok dari supplier.</p>
            </div>
        </div>

        <form action="<?php echo e(route('barang-masuk.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="space-y-6">
                <!-- Barang (Dropdown) -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Barang <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph-fill ph-package text-slate-400 text-lg"></i>
                        </div>
                        <select name="barang_id" required class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 cursor-pointer appearance-none">
                            <option value="">-- Pilih Barang di Gudang --</option>
                            <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($b->id); ?>"><?php echo e($b->kode_barang); ?> - <?php echo e($b->nama_barang); ?> (Sisa Stok: <?php echo e($b->stok); ?>)</option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <i class="ph-bold ph-caret-down text-slate-400"></i>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <!-- Jumlah Barang Masuk -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Jumlah Tambahan (Qty) <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph-bold ph-plus-circle text-emerald-500 text-lg"></i>
                            </div>
                            <input type="number" name="qty" required min="1" placeholder="Misal: 50" class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>

                    <!-- Tanggal -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Tanggal Berlabuh <span class="text-rose-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph-fill ph-calendar-blank text-slate-400 text-lg"></i>
                            </div>
                            <input type="date" name="tanggal" required value="<?php echo e(date('Y-m-d')); ?>" class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>
                </div>

                <!-- Supplier -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Pihak Supplier (Opsional)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="ph-fill ph-truck text-slate-400 text-lg"></i>
                        </div>
                        <input type="text" name="supplier" placeholder="Contoh: PT Indofood / Toko Maju" class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                    </div>
                </div>

                <!-- Catatan Tambahan -->
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Catatan Keterangan (Opsional)</label>
                    <textarea name="catatan" rows="3" placeholder="Contoh: Barang restock untuk persiapan puasa/lebaran..." class="block w-full p-4 bg-slate-50 border border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"></textarea>
                </div>

            </div>

            <!-- Tombol Aksi -->
            <div class="mt-8 pt-6 border-t border-slate-100 flex justify-end space-x-3">
                <a href="<?php echo e(route('barang-masuk.index')); ?>" class="px-6 py-3 bg-white text-slate-600 font-bold rounded-xl border border-slate-300 hover:bg-slate-50 transition">
                    Batal
                </a>
                <button type="submit" class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-extrabold rounded-xl shadow-[0_5px_15px_rgba(79,70,229,0.35)] hover:shadow-[0_8px_25px_rgba(79,70,229,0.5)] transition-all flex items-center hover:-translate-y-0.5">
                    <i class="ph-bold ph-check text-xl mr-2"></i> Proses & Tambah Stok
                </button>
            </div>
            
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\toko-kelontong\resources\views/barang_masuk/create.blade.php ENDPATH**/ ?>