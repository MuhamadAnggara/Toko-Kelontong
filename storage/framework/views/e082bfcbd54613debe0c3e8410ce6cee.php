<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak PDF Laporan Penjualan</title>
    <!-- Tailwind Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: PLUS JAKARTA SANS -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #fff; color: #1e293b; print-color-adjust: exact; -webkit-print-color-adjust: exact; padding: 20px; }
        @media print {
            body { padding: 0; }
            .no-print { display: none !important; }
        }
    </style>
</head>
<body onload="window.print()" class="antialiased max-w-5xl mx-auto">
    
    <div class="text-center mb-8 border-b-2 border-slate-800 pb-6">
        <h1 class="text-3xl font-extrabold uppercase tracking-tight text-slate-800">Laporan Penjualan Toko</h1>
        <p class="text-slate-500 font-medium mt-1">Sistem Informasi Manajemen - Toko Kelontong</p>
        <p class="text-sm font-bold text-slate-400 mt-3">Dicetak pada: <?php echo e(date('d F Y - H:i')); ?> WIB</p>
    </div>

    <table class="w-full text-left border-collapse border border-slate-300">
        <thead>
            <tr class="bg-indigo-50 border-b border-slate-300 text-slate-700 text-sm">
                <th class="py-3 px-4 font-bold uppercase border border-slate-300 text-center w-12">No</th>
                <th class="py-3 px-4 font-bold uppercase border border-slate-300">Waktu & Nota</th>
                <th class="py-3 px-4 font-bold uppercase border border-slate-300">Petugas / Pihak</th>
                <th class="py-3 px-4 font-bold uppercase border border-slate-300">Detail Terjual</th>
                <th class="py-3 px-4 font-bold uppercase border border-slate-300 text-right">Subtotal (Rp)</th>
            </tr>
        </thead>
        <tbody class="text-sm">
            <?php $grandTotal = 0; ?>
            <?php $__empty_1 = true; $__currentLoopData = $transaksis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php $grandTotal += $t->total_harga; ?>
            <tr class="border-b border-slate-200">
                <td class="py-3 px-4 border border-slate-300 text-center font-bold"><?php echo e($index + 1); ?></td>
                <td class="py-3 px-4 border border-slate-300 font-medium">
                    <?php echo e($t->created_at->format('d M Y')); ?><br>
                    <span class="text-xs text-slate-500"><?php echo e($t->no_nota); ?></span>
                </td>
                <td class="py-3 px-4 border border-slate-300 font-medium">
                    Kasir: <?php echo e($t->user->name ?? 'Kasir M'); ?><br>
                    <span class="text-xs <?php echo e($t->metode_pembayaran == 'Tunai' ? 'text-indigo-600' : 'text-emerald-600'); ?> font-bold"><?php echo e($t->metode_pembayaran); ?></span>
                </td>
                <td class="py-3 px-4 border border-slate-300">
                    <ul class="list-disc pl-4 text-xs space-y-1">
                    <?php $__currentLoopData = $t->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><b><?php echo e($d->barang->nama_barang ?? 'Barang Terhapus'); ?></b> (<?php echo e($d->qty); ?> item) - Rp<?php echo e(number_format($d->subtotal, 0, ',', '.')); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </td>
                <td class="py-3 px-4 border border-slate-300 text-right font-bold text-lg">
                    <?php echo e(number_format($t->total_harga, 0, ',', '.')); ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="5" class="py-8 text-center font-bold text-slate-400">Belum ada data transaksi tercatat.</td>
            </tr>
            <?php endif; ?>
        </tbody>
        <tfoot class="bg-indigo-600 text-white">
            <tr>
                <td colspan="4" class="py-4 px-4 border border-indigo-700 text-right font-extrabold uppercase tracking-widest text-sm">Total Omset Pendapatan Keseluruhan</td>
                <td class="py-4 px-4 border border-indigo-700 text-right font-black text-xl">
                    Rp <?php echo e(number_format($grandTotal, 0, ',', '.')); ?>

                </td>
            </tr>
        </tfoot>
    </table>

    <div class="mt-12 w-full flex justify-end text-sm font-medium">
        <div class="text-center w-48">
            <p class="mb-16 text-slate-500">Mengetahui,</p>
            <div class="border-b-2 border-slate-800 pb-1 font-bold text-slate-800">
                Pimpinan / Pemilik Toko
            </div>
        </div>
    </div>

    <!-- No print back button -->
    <div class="no-print fixed top-6 right-6 flex space-x-3">
        <button onclick="window.print()" class="px-5 py-2.5 bg-slate-900 text-white font-bold rounded-xl shadow-lg hover:bg-slate-800 transition flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 256 256"><path d="M224,96h-16V40a8,8,0,0,0-8-8H56a8,8,0,0,0-8,8V96H32a16,16,0,0,0-16,16v80a8,8,0,0,0,8,8H56v16a8,8,0,0,0,8,8H192a8,8,0,0,0,8-8V200h32a8,8,0,0,0,8-8V112A16,16,0,0,0,224,96ZM64,48H192V96H64ZM184,208H72V160H184Zm40-24H200V152a8,8,0,0,0-8-8H64a8,8,0,0,0-8,8v32H32V112H224Z"></path></svg>
            Print
        </button>
        <button onclick="window.close()" class="px-5 py-2.5 bg-rose-50 text-rose-600 font-bold rounded-xl border border-rose-100 hover:bg-rose-100 transition shadow-sm flex items-center">
            Tutup
        </button>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\toko-kelontong\resources\views/laporan/pdf.blade.php ENDPATH**/ ?>