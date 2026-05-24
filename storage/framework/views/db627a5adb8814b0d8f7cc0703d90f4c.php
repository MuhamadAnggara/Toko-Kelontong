

<?php $__env->startSection('header', 'Pengaturan Toko (Store Settings)'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 flex flex-col h-full overflow-hidden fade-in">
        
        <div class="flex items-center mb-8 border-b border-slate-200/60 pb-6">
            <div class="w-16 h-16 bg-slate-50 text-slate-400 rounded-2xl flex items-center justify-center mr-5 shadow-inner">
                <i class="ph-fill ph-storefront text-4xl"></i>
            </div>
            <div>
                <h2 class="text-2xl font-extrabold text-slate-800 tracking-tight">Profil & Pengaturan Toko</h2>
                <p class="text-slate-500 font-medium mt-1">Ubah identitas toko dan personalisasi cetakan struk kasir pelanggan.</p>
            </div>
        </div>

        <!-- Error Handling -->
        <?php if($errors->any()): ?>
            <div class="mb-6 bg-rose-50 border border-rose-200 text-rose-600 px-4 py-3 rounded-xl flex items-start shadow-sm">
                <i class="ph-fill ph-warning-circle text-xl mr-3 mt-0.5"></i>
                <div class="font-medium text-sm">
                    <ul class="list-disc pl-4 space-y-1">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('owner.pengaturan.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Bagian Profil Dasar -->
                <div class="space-y-5">
                    <h3 class="text-xs font-black text-indigo-500 uppercase tracking-widest flex items-center mb-4">
                        <i class="ph-bold ph-identification-card mr-2 text-base"></i> Profil Dasar Toko
                    </h3>
                    
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1.5">Nama Toko Utama <span class="text-rose-500">*</span></label>
                        <input type="text" name="nama_toko" value="<?php echo e(old('nama_toko', $pengaturan->nama_toko)); ?>" required class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-bold focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
                        <p class="text-[11px] font-medium text-slate-400 mt-1.5">Akan muncul di menu atas dan struk.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1.5">Alamat Lengkap Toko</label>
                        <textarea name="alamat" rows="3" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"><?php echo e(old('alamat', $pengaturan->alamat)); ?></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-1.5">Nomor Telepon / WhatsApp</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="ph-bold ph-phone text-slate-400 text-lg"></i>
                            </div>
                            <input type="text" name="telepon" value="<?php echo e(old('telepon', $pengaturan->telepon)); ?>" class="w-full pl-11 pr-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition font-medium">
                        </div>
                    </div>
                </div>

                <!-- Bagian Pengaturan Struk -->
                <div class="space-y-5 bg-slate-50 border border-slate-200 rounded-2xl p-6 relative">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-100 rounded-full mix-blend-multiply filter blur-2xl opacity-60 pointer-events-none"></div>
                    
                    <h3 class="text-xs font-black text-indigo-500 uppercase tracking-widest flex items-center mb-4 relative z-10">
                        <i class="ph-bold ph-receipt mr-2 text-base"></i> Struk Belanja Kasir
                    </h3>
                    
                    <div class="relative z-10">
                        <label class="block text-sm font-bold text-slate-700 mb-1.5">Catatan Bawah (Footer Struk)</label>
                        <textarea name="catatan_struk" rows="4" placeholder="Misal: Terima kasih telah berbelanja..." class="w-full px-4 py-3 rounded-xl border border-slate-300 bg-white text-slate-800 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"><?php echo e(old('catatan_struk', $pengaturan->catatan_struk)); ?></textarea>
                        <p class="text-[11px] font-medium text-slate-500 mt-2 leading-relaxed">
                            Pesan singkat yang akan selalu tercetak otomatis di bagian paling bawah pada kertas struk pembayaran pelanggan.
                        </p>
                    </div>

                    <!-- Preview Mungil -->
                    <div class="mt-4 border border-slate-300 bg-white p-4 rounded-lg shadow-sm w-full mx-auto relative z-10">
                        <p class="text-center font-black text-sm text-slate-800 mb-1" id="previewNama"><?php echo e($pengaturan->nama_toko ?: 'Nama Toko'); ?></p>
                        <p class="text-center text-[10px] text-slate-500 mb-3 border-b border-dashed border-slate-300 pb-2">
                            <span id="previewAlamat"><?php echo e($pengaturan->alamat ?: 'Alamat Toko'); ?></span><br>
                            Telp: <span id="previewTelp"><?php echo e($pengaturan->telepon ?: '-'); ?></span>
                        </p>
                        <p class="text-xs font-mono text-slate-400 text-center mb-3">... List Belanja ...</p>
                        <p class="text-center text-[10px] font-bold text-slate-600 border-t border-dashed border-slate-300 pt-2" id="previewCatatan">
                            <?php echo e($pengaturan->catatan_struk ?: 'Terima Kasih'); ?>

                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-slate-100 flex justify-end">
                <button type="submit" class="px-8 py-3.5 bg-slate-900 hover:bg-slate-800 text-white font-extrabold rounded-xl shadow-lg shadow-slate-900/20 transition-all flex items-center hover:-translate-y-0.5">
                    <i class="ph-bold ph-floppy-disk text-xl mr-2"></i> Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Live Preview
    const inputs = {
        'nama_toko': 'previewNama',
        'alamat': 'previewAlamat',
        'telepon': 'previewTelp',
        'catatan_struk': 'previewCatatan'
    };

    for(let [inputName, previewId] of Object.entries(inputs)) {
        document.querySelector(`[name="${inputName}"]`).addEventListener('input', function(e) {
            document.getElementById(previewId).innerText = e.target.value || '-';
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\toko-kelontong\resources\views/owner/pengaturan.blade.php ENDPATH**/ ?>