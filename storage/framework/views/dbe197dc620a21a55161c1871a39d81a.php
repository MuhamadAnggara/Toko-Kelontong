

<?php $__env->startSection('header', 'Manajemen Karyawan (Admin & Kasir)'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-white rounded-3xl p-8 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 flex flex-col h-full overflow-hidden fade-in relative">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-800 tracking-tight">Data Karyawan Aktif</h2>
            <p class="text-slate-500 font-medium mt-1 text-sm">Daftar seluruh akun Admin dan Kasir yang terdaftar di sistem.</p>
        </div>
        
        <button onclick="document.getElementById('modalTambah').classList.remove('hidden'); document.getElementById('modalTambah').classList.add('flex');" class="px-5 py-2.5 bg-indigo-600 text-white font-extrabold text-sm rounded-xl shadow-[0_5px_15px_rgba(79,70,229,0.3)] hover:bg-indigo-700 hover:-translate-y-0.5 transition flex items-center">
            <i class="ph-bold ph-plus mr-2 text-lg"></i> Karyawan Baru
        </button>
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

    <div class="bg-white rounded-2xl border border-slate-200/60 overflow-hidden shadow-sm flex-1 flex flex-col">
        <div class="overflow-x-auto custom-scrollbar">
            <table class="w-full text-left border-collapse min-w-[700px]">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-200/60 text-slate-400 text-[11px] uppercase tracking-widest font-black">
                        <th class="py-4 px-6 w-1/3">Nama & Hak Akses User</th>
                        <th class="py-4 px-6">Peran (Role)</th>
                        <th class="py-4 px-6">Tanggal Bergabung</th>
                        <th class="py-4 px-6 text-center w-28">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php $__empty_1 = true; $__currentLoopData = $karyawans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-indigo-50/30 transition-colors group">
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full <?php echo e($k->role == 'admin' ? 'bg-amber-100 text-amber-600' : 'bg-indigo-100 text-indigo-600'); ?> flex items-center justify-center font-bold mr-4 shadow-inner text-sm flex-shrink-0">
                                    <?php echo e(strtoupper(substr($k->name, 0, 1))); ?>

                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800 text-sm"><?php echo e($k->name); ?></h4>
                                    <p class="text-xs font-mono text-slate-500 mt-0.5 bg-slate-100 px-1.5 py-0.5 rounded w-fit"><?php echo e($k->username); ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <?php if($k->role == 'admin'): ?>
                                <span class="px-2.5 py-1 bg-amber-50 text-amber-600 font-bold text-xs rounded-lg border border-amber-100 uppercase tracking-widest flex items-center w-fit">
                                    <i class="ph-fill ph-shield-check mr-1.5"></i> Administrator
                                </span>
                            <?php else: ?>
                                <span class="px-2.5 py-1 bg-indigo-50 text-indigo-600 font-bold text-xs rounded-lg border border-indigo-100 uppercase tracking-widest flex items-center w-fit">
                                    <i class="ph-fill ph-cash-register mr-1.5"></i> Kasir Toko
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 px-6">
                            <span class="font-bold text-slate-700 text-sm"><?php echo e($k->created_at->format('d M Y')); ?></span>
                            <span class="text-xs font-medium text-slate-400 block mt-0.5"><?php echo e($k->created_at->diffForHumans()); ?></span>
                        </td>
                        <td class="py-4 px-6 text-center">
                            <div class="flex items-center justify-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button onclick="openEditModal(<?php echo e($k->id); ?>, '<?php echo e(addslashes($k->name)); ?>', '<?php echo e(addslashes($k->username)); ?>', '<?php echo e($k->role); ?>')" class="w-8 h-8 rounded-lg bg-slate-100 text-slate-500 hover:bg-emerald-50 hover:text-emerald-600 hover:border-emerald-200 transition border border-transparent flex items-center justify-center tooltip" title="Edit Akun Karyawan">
                                    <i class="ph-bold ph-pencil-simple text-sm"></i>
                                </button>
                                <form action="<?php echo e(route('owner.karyawan.destroy', $k->id)); ?>" method="POST" onsubmit="return confirm('Peringatan: Menghapus akun ini bersifat permanen. Apabila dihapus, user ini tidak bisa mengakses sistem lagi. Yakin hapus?');" class="inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="w-8 h-8 rounded-lg bg-slate-100 text-slate-500 hover:bg-rose-50 hover:text-rose-600 hover:border-rose-200 transition border border-transparent flex items-center justify-center tooltip" title="Hapus Akun Permanen">
                                        <i class="ph-bold ph-trash text-sm"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="py-16 text-center">
                            <div class="w-20 h-20 bg-slate-50 text-slate-300 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="ph-fill ph-users text-4xl"></i>
                            </div>
                            <h3 class="font-bold text-slate-700 mb-1">Tidak Ada Karyawan Terdaftar</h3>
                            <p class="text-slate-500 font-medium text-sm">Tambahkan akun admin atau kasir untuk memberikan mereka akses login toko.</p>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Karyawan -->
<div id="modalTambah" class="fixed inset-0 bg-slate-900/80 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-3xl p-6 md:p-8 max-w-md w-full shadow-2xl relative transform transition-all">
        <button onclick="document.getElementById('modalTambah').classList.add('hidden'); document.getElementById('modalTambah').classList.remove('flex');" class="absolute top-6 right-6 text-slate-400 hover:text-slate-600 bg-slate-100 hover:bg-slate-200 w-8 h-8 rounded-full flex items-center justify-center transition">
            <i class="ph-bold ph-x text-lg"></i>
        </button>
        
        <div class="flex items-center mb-6">
            <div class="w-12 h-12 bg-indigo-50 text-indigo-500 rounded-2xl flex items-center justify-center mr-4">
                <i class="ph-bold ph-user-plus text-2xl"></i>
            </div>
            <div>
                <h3 class="text-xl font-extrabold text-slate-800">Tambah Karyawan</h3>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Pembuatan Akun Login</p>
            </div>
        </div>
        
        <form action="<?php echo e(route('owner.karyawan.store')); ?>" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?>
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">Kewenangan Murni (Role)</label>
                <div class="relative">
                    <select name="role" required class="w-full pl-4 pr-10 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-bold focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition cursor-pointer appearance-none">
                        <option value="kasir">Kasir Mesin POS</option>
                        <option value="admin">Administrator (Backoffice)</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                        <i class="ph-bold ph-caret-down text-slate-400"></i>
                    </div>
                </div>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">Nama Lengkap Sesuai KTP</label>
                <input type="text" name="name" required placeholder="Contoh: Budi Santoso" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition font-medium">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">Username Login</label>
                <input type="text" name="username" required placeholder="Contoh: budi123" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition font-medium">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">Password Awal (Default)</label>
                <input type="password" name="password" required minlength="6" placeholder="Minimal 6 karakter" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition font-medium">
            </div>
            <button type="submit" class="w-full py-3.5 mt-4 bg-indigo-600 hover:bg-indigo-700 text-white font-extrabold rounded-xl shadow-lg shadow-indigo-600/30 transition hover:-translate-y-0.5">Daftarkan & Simpan</button>
        </form>
    </div>
</div>

<!-- Modal Edit Karyawan -->
<div id="modalEdit" class="fixed inset-0 bg-slate-900/80 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-3xl p-6 md:p-8 max-w-md w-full shadow-2xl relative transform transition-all">
        <button onclick="document.getElementById('modalEdit').classList.add('hidden'); document.getElementById('modalEdit').classList.remove('flex');" class="absolute top-6 right-6 text-slate-400 hover:text-slate-600 bg-slate-100 hover:bg-slate-200 w-8 h-8 rounded-full flex items-center justify-center transition">
            <i class="ph-bold ph-x text-lg"></i>
        </button>
        
        <div class="flex items-center mb-6">
            <div class="w-12 h-12 bg-amber-50 text-amber-500 rounded-2xl flex items-center justify-center mr-4">
                <i class="ph-bold ph-note-pencil text-2xl"></i>
            </div>
            <div>
                <h3 class="text-xl font-extrabold text-slate-800">Edit Akun Master</h3>
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Perbaruan Data Karyawan</p>
            </div>
        </div>
        
        <form id="formEdit" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">Kewenangan Akses</label>
                <div class="relative">
                    <select name="role" id="eRole" required class="w-full pl-4 pr-10 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-bold focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition cursor-pointer appearance-none">
                        <option value="kasir">Kasir Mesin POS</option>
                        <option value="admin">Administrator (Backoffice)</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                        <i class="ph-bold ph-caret-down text-slate-400"></i>
                    </div>
                </div>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">Nama Karyawan</label>
                <input type="text" name="name" id="eName" required class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition font-medium">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wide">Username Sistem</label>
                <input type="text" name="username" id="eUsername" required class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-mono focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition font-medium">
            </div>
            
            <div class="p-4 bg-slate-50 rounded-xl border border-slate-200/60 relative overflow-hidden mt-6">
                <div class="absolute left-0 top-0 w-1 h-full bg-amber-500"></div>
                <label class="block text-xs font-bold text-slate-800 mb-1 uppercase tracking-wide flex items-center">
                    <i class="ph-fill ph-lock-key mr-1.5 text-amber-500"></i> Penyetelan Ulang Kata Sandi
                </label>
                <p class="text-[11px] font-medium text-slate-500 mb-3 leading-relaxed">
                    Abaikan atau biarkan input ini kosong apabila operasional password karyawan masih valid saat ini.
                </p>
                <input type="password" name="password" minlength="6" placeholder="Ketik kata sandi baru..." class="w-full px-4 py-2.5 rounded-xl border border-slate-300 bg-white text-slate-800 focus:ring-2 focus:ring-amber-500 focus:border-amber-500 outline-none transition font-medium placeholder-slate-400">
            </div>
            
            <button type="submit" class="w-full py-3.5 mt-4 bg-slate-900 hover:bg-slate-800 text-white font-extrabold rounded-xl shadow-lg transition hover:-translate-y-0.5">Simpan Perubahan Data</button>
        </form>
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar { height: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    .custom-scrollbar:hover::-webkit-scrollbar-thumb { background: #94a3b8; }
</style>

<script>
    const baseUrl = "<?php echo e(url('owner/karyawan')); ?>";
    function openEditModal(id, name, username, role) {
        document.getElementById('formEdit').action = baseUrl + '/' + id;
        document.getElementById('eName').value = name;
        document.getElementById('eUsername').value = username;
        document.getElementById('eRole').value = role;
        
        const m = document.getElementById('modalEdit');
        m.classList.remove('hidden');
        m.classList.add('flex');
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\toko-kelontong\resources\views/owner/karyawan.blade.php ENDPATH**/ ?>