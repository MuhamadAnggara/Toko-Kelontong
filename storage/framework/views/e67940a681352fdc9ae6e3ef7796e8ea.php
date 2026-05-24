<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Struk Transaksi - <?php echo e($transaksi->no_nota); ?></title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            font-size: 12px;
            color: #000;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .struk-container {
            width: 300px;
            margin: 20px auto;
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 15px;
            border-bottom: 1px dashed #000;
            padding-bottom: 15px;
        }
        .header h1 {
            font-size: 18px;
            margin: 0 0 5px 0;
            text-transform: uppercase;
        }
        .header p {
            margin: 0;
            font-size: 11px;
        }
        .info {
            margin-bottom: 15px;
            font-size: 11px;
        }
        .info table {
            width: 100%;
        }
        .info td {
            padding: 2px 0;
        }
        .items {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            border-top: 1px dashed #000;
            border-bottom: 1px dashed #000;
        }
        .items th, .items td {
            text-align: left;
            padding: 5px 0;
        }
        .items th:last-child, .items td:last-child {
            text-align: right;
        }
        .items .qty {
            padding-right: 5px;
        }
        .totals {
            width: 100%;
            margin-bottom: 15px;
        }
        .totals td {
            padding: 3px 0;
        }
        .totals .right {
            text-align: right;
        }
        .totals .bold {
            font-weight: bold;
        }
        .footer {
            text-align: center;
            font-size: 11px;
            border-top: 1px dashed #000;
            padding-top: 15px;
        }
        @media print {
            body { background-color: transparent; }
            .struk-container { margin: 0; box-shadow: none; border-radius: 0; }
            button { display: none !important; }
        }
        .btn-print {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4f46e5;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            margin-bottom: 10px;
            font-family: inherit;
        }
        .btn-print:hover { background-color: #4338ca; }
    </style>
</head>
<body onload="checkPrint()">

    <div class="struk-container">
        
        <button class="btn-print" id="btnPrint" onclick="window.print()">Cetak Sekarang</button>

        <?php
            $pengaturan = \Illuminate\Support\Facades\DB::table('pengaturans')->first();
        ?>
        <div class="header">
            <h1><?php echo e($pengaturan->nama_toko ?? 'Toko Kelontong'); ?></h1>
            <p><?php echo e($pengaturan->alamat ?? 'Sistem Informasi Manajemen Terpadu'); ?></p>
            <?php if(!empty($pengaturan->telepon)): ?>
            <p>Telp: <?php echo e($pengaturan->telepon); ?></p>
            <?php endif; ?>
            <p style="margin-top: 8px; font-weight: bold;">STRUK PEMBELIAN</p>
        </div>

        <div class="info">
            <table>
                <tr>
                    <td>No Nota</td>
                    <td>:</td>
                    <td><?php echo e($transaksi->no_nota); ?></td>
                </tr>
                <tr>
                    <td>Tgl/Waktu</td>
                    <td>:</td>
                    <td><?php echo e($transaksi->created_at->format('d/m/Y H:i')); ?></td>
                </tr>
                <tr>
                    <td>Kasir</td>
                    <td>:</td>
                    <td><?php echo e($transaksi->user->name); ?></td>
                </tr>
            </table>
        </div>

        <table class="items">
            <thead>
                <tr>
                    <th>Item</th>
                    <th style="text-align: center">Qty</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $transaksi->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($d->barang->nama_barang ?? 'Barang Dihapus'); ?></td>
                    <td style="text-align: center" class="qty"><?php echo e($d->qty); ?></td>
                    <td><?php echo e(number_format($d->harga_satuan, 0, ',', '.')); ?></td>
                    <td><?php echo e(number_format($d->subtotal, 0, ',', '.')); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <table class="totals">
            <tr>
                <td>Total Belanja</td>
                <td class="right bold text-lg">Rp <?php echo e(number_format($transaksi->total_harga, 0, ',', '.')); ?></td>
            </tr>
            <tr>
                <td>Tunai/Bayar</td>
                <td class="right">Rp <?php echo e(number_format($transaksi->uang_bayar, 0, ',', '.')); ?></td>
            </tr>
            <tr>
                <td>Kembalian</td>
                <td class="right bold">Rp <?php echo e(number_format($transaksi->kembalian, 0, ',', '.')); ?></td>
            </tr>
        </table>

        <div class="footer">
            <p><?php echo e($pengaturan->catatan_struk ?? 'Terima kasih atas kunjungan Anda!'); ?></p>
        </div>
    </div>

    <script>
        function checkPrint() {
            setTimeout(function() {
                window.print();
            }, 500);
        }
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\toko-kelontong\resources\views/kasir/cetak-struk.blade.php ENDPATH**/ ?>