# 🛒 Aplikasi Toko Kelontong (POS & Inventory System)

Aplikasi Toko Kelontong adalah Sistem Informasi Kasir (Point of Sales) dan Manajemen Inventaris berbasis web yang dibangun menggunakan **Laravel 10** dan **MySQL**. Aplikasi ini didesain khusus untuk memudahkan pengelolaan operasional toko sembako/kelontong mulai dari pencatatan barang, manajemen stok, hingga transaksi pembelian kasir.

---

## 🌟 Fitur Utama

Sistem ini memiliki beberapa tingkatan akses pengguna (Role) dengan fitur masing-masing:

### 1. 🌐 Area Publik (Pengunjung)
- **Katalog Produk:** Menampilkan daftar katalog barang dan produk yang tersedia di toko berdasarkan kategori.
- **Pencarian Barang:** Pengunjung dapat mencari spesifik barang menggunakan fitur *search*.
- **Tentang Kami:** Halaman pengenalan profil toko.

### 2. 🧑‍💼 Area Kasir / Pegawai
- **Autentikasi (Login/Logout):** Akses masuk yang aman.
- **Dashboard Ringkasan:** Menampilkan rangkuman transaksi dan aktivitas.
- **Point of Sales (POS):** Sistem perhitungan keranjang belanja kasir yang cepat saat pelanggan melakukan pembelian barang.
- **Cetak Struk:** Fitur mencetak bukti pembayaran (struk belanja) dalam bentuk yang rapi setelah transaksi selesai.
- **Manajemen Inventaris:**
  - Tambah, Edit, Hapus **Data Barang**.
  - Mengelola kelompok **Kategori Barang**.
  - Mencatat rekap **Barang Masuk** (Restock).
- **Laporan:** Melihat rekap laporan ringan harian/bulanan.

### 3. 👑 Area Owner / Pemilik
- **Owner Dashboard:** Panel kontrol utama untuk pemilik toko memonitor performa bisnis.
- **Laporan Lanjutan:** Ekspor laporan penjualan ke dalam bentuk **Excel** dan cetak **PDF**.
- **Manajemen Karyawan:** Menambah, mengubah, dan menghapus (CRUD) akses logik akun pegawai/kasir.
- **Pengaturan Toko:** Mengelola pengaturan sistem dasar.

---

## 🛠️ Teknologi yang Digunakan
- **Framework:** Laravel v10.x
- **Bahasa Pemrograman:** PHP (Minimal v8.1)
- **Database:** MySQL
- **CSS Framework/UI:** (Bawaan Laravel / Bootstrap / Tailwind - Sesuaikan dengan yang digunakan)
- **Web Server:** Laragon / XAMPP (Apache/Nginx)

---

## 🚀 Panduan Instalasi dan Penggunaan LOKAL (Development)

Ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi di komputer lokal (localhost):

1. **Persiapan Database:**
   - Hidupkan aplikasi DB Manager Anda (Misalnya: Laragon, XAMPP).
   - Buat sebuah database baru baru di MySQL dengan nama `toko_kelontong`.
   - Lakukan **Import** file `toko_kelontong.sql` yang sudah tersedia di *root* folder project ini ke dalam database yang baru saja Anda buat.

2. **Buka Terminal / Command Prompt:**
   - Arahkan direktori terminal ke dalam folder aplikasi (`cd c:\laragon\www\toko-kelontong`).

3. **Install Dependensi Composer:**
   ```bash
   composer install
   ```

4. **Konfigurasi Environment:**
   - Periksa apakah file `.env` sudah ada. (Jika belum, salin file `.env.example` ke `.env`).
   - Pastikan konfigurasi Database pada file `.env` sudah sesuai. Biasanya:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=toko_kelontong
     DB_USERNAME=root
     DB_PASSWORD=
     ```

5. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

6. **Jalankan Aplikasi:**
   ```bash
   php artisan serve
   ```
   Aplikasi Anda saat ini berjalan! Buka Web Browser dan ketik alamat: `http://localhost:8000` (Atau jika Anda menggunakan ekstensi *.test* di Laragon, Anda bisa mengakses `http://toko-kelontong.test`).

---

## 🔒 Catatan Akses Login
Untuk dapat mencoba Sistem Kasir/Owner:

Akses `http://localhost:8000/login`
- *(Silakan tambahkan Username/Email dan Password bawaan untuk Owner maupun Kasir yang terdapat pada isi database Anda)*

---
*Dibuat untuk memudahkan produktivitas dan administrasi transaksi harian toko Anda.*
