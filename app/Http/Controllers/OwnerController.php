<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Transaksi;

class OwnerController extends Controller
{
    public function dashboard()
    {
        // 1. Total Pendapatan
        $sum_pendapatan = Transaksi::sum('total_harga');
        $total_pendapatan = 'Rp ' . number_format($sum_pendapatan, 0, ',', '.');
        
        // 2. Baris Terlaris
        $terlaris = \Illuminate\Support\Facades\DB::table('detail_transaksis')
            ->select('barang_id', \Illuminate\Support\Facades\DB::raw('SUM(qty) as total_qty'))
            ->groupBy('barang_id')
            ->orderByDesc('total_qty')
            ->first();
            
        $barang_terlaris = $terlaris ? Barang::find($terlaris->barang_id)->nama_barang : 'Belum ada';
        
        // 3. Stok
        $total_stok = Barang::sum('stok');

        // 4. Riwayat Transaksi Terbaru (5 data terakhir)
        $transaksi_terbaru = Transaksi::with(['user', 'details'])->latest()->take(5)->get();

        // 5. Data Grafik 7 Hari Terakhir
        $grafik = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $total = Transaksi::whereDate('created_at', $date)->sum('total_harga');
            $grafik[] = [
                'tanggal' => now()->subDays($i)->format('d M'),
                'total' => $total
            ];
        }
        $max_grafik = count($grafik) > 0 ? max(array_column($grafik, 'total')) : 1;
        if($max_grafik == 0) $max_grafik = 1; // avoid division by zero
        
        return view('owner.dashboard', compact('total_pendapatan', 'barang_terlaris', 'total_stok', 'transaksi_terbaru', 'grafik', 'max_grafik'));
    }

    public function laporan()
    {
        $transaksis = Transaksi::with('user')->latest()->get();
        return view('laporan.index', compact('transaksis'));
    }

    public function karyawan()
    {
        $karyawans = \App\Models\User::whereIn('role', ['admin', 'kasir'])->get();
        return view('owner.karyawan', compact('karyawans'));
    }

    public function storeKaryawan(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,kasir'
        ]);
        
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        
        \App\Models\User::create($data);
        return redirect()->route('owner.karyawan')->with('success', 'Akun karyawan '. $request->name .' berhasil didaftarkan.');
    }

    public function updateKaryawan(Request $request, $id)
    {
        $karyawan = \App\Models\User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,'.$karyawan->id,
            'password' => 'nullable|min:6',
            'role' => 'required|in:admin,kasir'
        ]);
        
        $data = $request->only(['name', 'username', 'role']);
        if($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }
        
        $karyawan->update($data);
        return redirect()->route('owner.karyawan')->with('success', 'Data akun '. $request->name .' berhasil diperbarui.');
    }

    public function destroyKaryawan($id)
    {
        $karyawan = \App\Models\User::findOrFail($id);
        $nama = $karyawan->name;
        $karyawan->delete();
        return redirect()->route('owner.karyawan')->with('success', 'Akun karyawan '. $nama .' berhasil dihapus permanen.');
    }

    public function pengaturan()
    {
        $pengaturan = \Illuminate\Support\Facades\DB::table('pengaturans')->first();
        if (!$pengaturan) {
            \Illuminate\Support\Facades\DB::table('pengaturans')->insert([
                'nama_toko' => 'Toko Kelontong',
                'alamat' => '',
                'telepon' => '',
                'catatan_struk' => 'Terima kasih telah berbelanja!',
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $pengaturan = \Illuminate\Support\Facades\DB::table('pengaturans')->first();
        }
        return view('owner.pengaturan', compact('pengaturan'));
    }

    public function updatePengaturan(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:100',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
            'catatan_struk' => 'nullable|string',
        ]);

        \Illuminate\Support\Facades\DB::table('pengaturans')->where('id', 1)->update([
            'nama_toko' => $request->nama_toko,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'catatan_struk' => $request->catatan_struk,
            'updated_at' => now()
        ]);

        return redirect()->route('owner.pengaturan')->with('success', 'Profil dan Pengaturan Toko berhasil diperbarui.');
    }
}
