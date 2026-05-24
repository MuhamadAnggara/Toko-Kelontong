@php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Laporan_Penjualan_Toko_Kelontong_".date('Y-m-d').".xls");
@endphp
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan Excel</title>
</head>
<body>
    <h3>Laporan Penjualan Toko Kelontong</h3>
    <p>Dicetak pada: {{ date('d F Y H:i') }}</p>

    <table border="1" style="border-collapse: collapse; text-align: left;">
        <thead>
            <tr>
                <th style="background-color: #fce4d6;">No</th>
                <th style="background-color: #fce4d6;">Tanggal</th>
                <th style="background-color: #fce4d6;">No Nota</th>
                <th style="background-color: #fce4d6;">Kasir</th>
                <th style="background-color: #fce4d6;">Metode Pembayaran</th>
                <th style="background-color: #fce4d6;">Rincian Barang</th>
                <th style="background-color: #fce4d6;">Total Belanja (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach($transaksis as $index => $t)
            @php $grandTotal += $t->total_harga; @endphp
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $t->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $t->no_nota }}</td>
                <td>{{ $t->user->name ?? 'Kasir M' }}</td>
                <td>{{ $t->metode_pembayaran }}</td>
                <td>
                    @foreach($t->details as $d)
                        - {{ $d->barang->nama_barang ?? 'Barang Dihapus' }} ({{ $d->qty }}x @ Rp{{ number_format($d->harga_satuan, 0, ',', '.') }})<br>
                    @endforeach
                </td>
                <td>{{ $t->total_harga }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" style="text-align: right; background-color: #fce4d6;"><strong>Total Keseluruhan (Rp)</strong></td>
                <td style="background-color: #fce4d6;"><strong>{{ $grandTotal }}</strong></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
