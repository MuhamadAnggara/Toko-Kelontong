

<?php $__env->startSection('header', 'Mesin Kasir (Point of Sales)'); ?>

<?php $__env->startSection('content'); ?>
<div class="h-[calc(100vh-140px)] flex flex-col md:flex-row gap-6 -mb-4">
    
    <!-- Bagian Kiri: Area Produk -->
    <div class="flex-1 bg-white rounded-3xl p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 flex flex-col h-full overflow-hidden">
        
        <!-- Search bar -->
        <div class="mb-6 relative flex-shrink-0">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <i class="ph-bold ph-magnifying-glass text-indigo-500"></i>
            </div>
            <input type="text" id="cariProduk" class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 text-slate-800 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors placeholder-slate-400 font-medium shadow-inner" placeholder="Pindai barcode atau cari nama produk..." autofocus>
        </div>

        <!-- Grid Produk -->
        <div class="flex-1 overflow-y-auto pr-2 custom-scrollbar" id="katalog-produk">
            <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="product-item bg-white border border-slate-200 rounded-2xl p-4 cursor-pointer hover:border-indigo-400 hover:shadow-lg transition-all transform hover:-translate-y-1 group" data-id="<?php echo e($b->id); ?>" data-nama="<?php echo e($b->nama_barang); ?>" data-harga="<?php echo e($b->harga_jual); ?>" data-kode="<?php echo e($b->kode_barang); ?>" data-stok="<?php echo e($b->stok); ?>" data-gambar="<?php echo e($b->gambar ? asset('storage/' . $b->gambar) : ''); ?>">
                    <div class="aspect-square bg-slate-50 rounded-xl mb-3 flex items-center justify-center overflow-hidden p-2">
                        <?php if($b->gambar): ?>
                            <img src="<?php echo e(asset('storage/' . $b->gambar)); ?>" class="w-full h-full object-contain group-hover:scale-105 transition-transform" alt="<?php echo e($b->nama_barang); ?>">
                        <?php else: ?>
                            <i class="ph-fill ph-package text-4xl text-slate-300"></i>
                        <?php endif; ?>
                    </div>
                    <p class="text-[10px] uppercase font-bold tracking-wider text-slate-400 mb-1"><?php echo e($b->kode_barang); ?></p>
                    <h3 class="font-extrabold text-slate-800 text-sm mb-2 line-clamp-2 leading-tight item-nama"><?php echo e($b->nama_barang); ?></h3>
                    <div class="flex justify-between items-end mt-auto">
                        <p class="font-bold text-indigo-600 text-sm">Rp<?php echo e(number_format($b->harga_jual, 0, ',', '.')); ?></p>
                        <p class="text-xs font-semibold px-2 py-0.5 rounded-md <?php echo e($b->stok < 10 ? 'bg-rose-100 text-rose-600' : 'bg-slate-100 text-slate-500'); ?>">Sisa <?php echo e($b->stok); ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>


    <!-- Bagian Kanan: Keranjang/Struk -->
    <div class="w-full md:w-[380px] lg:w-[450px] bg-slate-900 rounded-3xl p-5 shadow-2xl border border-slate-700 flex flex-col text-white h-full shrink-0 relative overflow-hidden">
        <!-- Dekorasi Background -->
        <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
        <div class="absolute bottom-0 left-0 -ml-16 -mb-16 w-64 h-64 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>

        <div class="relative z-10 flex flex-col h-full">    
            <!-- Header Keranjang -->
            <div class="flex justify-between items-center mb-3 border-b border-slate-700/50 pb-3 shrink-0">
                <h3 class="font-extrabold text-xl flex items-center">
                    <i class="ph-fill ph-shopping-cart text-indigo-400 mr-2 text-2xl"></i> Struk Belanja
                </h3>
                <button id="btnBatal" class="text-xs font-bold text-rose-400 hover:text-white hover:bg-rose-500 px-3 py-1.5 rounded-lg border border-rose-400 hover:border-rose-500 transition-colors">Kosongkan</button>
            </div>

            <!-- List Item Keranjang -->
            <div class="flex-1 overflow-y-auto mb-2 custom-scrollbar bg-slate-800/30 rounded-2xl p-2 border border-slate-700/30 min-h-0" id="keranjangList">
                <div class="flex flex-col items-center justify-center h-full text-slate-500 opacity-50 space-y-3 p-4 text-center">
                    <i class="ph-fill ph-basket text-6xl"></i>
                    <p class="font-medium text-sm">Belum ada barang di dalam struk. <br/>Klik barang di katalog kiri untuk memasukkan ke keranjang.</p>
                </div>
                <!-- Tempat JS akan menyuntikkan HTML keranjang -->
            </div>

            <!-- Ringkasan & Pembayaran -->
            <div class="border-t border-slate-700/50 pt-3 mt-auto shrink-0">
                <div class="flex justify-between items-center mb-1">
                    <span class="text-slate-400 font-medium text-sm">Subtotal</span>
                    <span class="font-bold text-white text-base" id="txtSubtotal">Rp 0</span>
                </div>
                <div class="flex justify-between items-center mb-2">
                    <span class="text-slate-400 font-medium text-sm">PPN (0%)</span>
                    <span class="font-bold text-emerald-400 text-base">Rp 0</span>
                </div>
                
                <div class="p-2.5 bg-indigo-600/20 border border-indigo-500/30 rounded-xl mb-3 backdrop-blur-md">
                    <div class="flex justify-between items-center">
                        <span class="font-extrabold text-indigo-300 text-sm uppercase tracking-wider">Total</span>
                        <span class="font-black text-xl text-white tracking-tight" id="txtTotal">Rp 0</span>
                    </div>
                </div>

                <div class="space-y-3">
                    <!-- Hapus Metode Pembayaran karena toko offline -->

                    <div class="relative" id="bayarContainer">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-slate-400 font-bold text-sm">Bayar</span>
                        </div>
                        <input type="text" id="inputBayar" class="block w-full pl-16 pr-4 py-2 bg-slate-800 border border-slate-600 text-white rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors placeholder-slate-500 font-bold text-base shadow-inner appearance-none outline-none" placeholder="0">
                    </div>
                    
                    <button id="btnBayar" class="w-full py-2.5 bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-400 hover:to-teal-400 text-white font-extrabold text-base rounded-xl shadow-lg shadow-emerald-500/30 hover:-translate-y-0.5 transition-transform flex justify-center items-center opacity-50 cursor-not-allowed">
                        <i class="ph-bold ph-receipt mr-2 text-xl"></i> Proses Pembayaran
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Kembalian -->
<div id="modalSelesai" class="fixed inset-0 bg-slate-900/80 backdrop-blur-sm z-50 hidden flex-col items-center justify-center">
    <div class="bg-white rounded-3xl p-8 max-w-sm w-full mx-4 shadow-2xl transform scale-95 opacity-0 transition-all duration-300" id="modalSelesaiContent">
        <div class="w-20 h-20 bg-emerald-100 text-emerald-500 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="ph-fill ph-check-circle text-5xl"></i>
        </div>
        <h3 class="text-2xl font-black text-slate-800 text-center mb-2">Transaksi Sukses!</h3>
        <p class="text-center text-slate-500 mb-6 text-sm">No Nota: <span id="mNota" class="font-bold text-indigo-600"></span></p>
        
        <div class="bg-slate-50 border border-slate-100 rounded-2xl p-4 mb-6 text-center">
            <p class="text-xs uppercase tracking-widest text-slate-400 font-bold mb-1">Kembalian</p>
            <p class="text-3xl font-black text-emerald-600" id="mKembalian">Rp 0</p>
        </div>

        <div class="space-y-3">
            <button class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow transition" onclick="window.location.reload()">
                <i class="ph-bold ph-arrow-counter-clockwise mr-2"></i> Transaksi Baru
            </button>
            <a target="_blank" href="#" id="btnCetakModal" class="w-full py-3 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 font-bold rounded-xl transition flex items-center justify-center">
                <i class="ph-bold ph-printer mr-2"></i> Cetak Struk
            </a>
        </div>
    </div>
</div>

<style>
    /* Custom Scrollbar for POS */
    .custom-scrollbar::-webkit-scrollbar { width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    .custom-scrollbar:hover::-webkit-scrollbar-thumb { background: #94a3b8; }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let cart = [];
        const items = document.querySelectorAll('.product-item');
        const cartList = document.getElementById('keranjangList');
        const txtTotal = document.getElementById('txtTotal');
        const txtSubtotal = document.getElementById('txtSubtotal');
        const inputBayar = document.getElementById('inputBayar');
        const btnBayar = document.getElementById('btnBayar');
        const cariProduk = document.getElementById('cariProduk');
        
        // Pencarian Produk
        cariProduk.addEventListener('input', function(e) {
            const query = e.target.value.toLowerCase();
            items.forEach(item => {
                const nama = item.dataset.nama.toLowerCase();
                const kode = item.dataset.kode.toLowerCase();
                if(nama.includes(query) || kode.includes(query)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        // Event Tambah Barang ke Keranjang
        items.forEach(item => {
            item.addEventListener('click', function() {
                const id = this.dataset.id;
                const nama = this.dataset.nama;
                const harga = parseFloat(this.dataset.harga);
                const stok = parseInt(this.dataset.stok);
                const gambar = this.dataset.gambar;

                // Cek apakah produk sudah ada di cart
                const ix = cart.findIndex(i => i.id === id);
                if(ix !== -1) {
                    if (cart[ix].qty >= stok) { alert('Stok tidak cukup!'); return; }
                    cart[ix].qty++;
                } else {
                    if (stok < 1) { alert('Stok produk habis!'); return; }
                    cart.push({ id, nama, harga, qty: 1, stok, gambar });
                }
                updateCart();
            });
        });

        // Kosongkan Keranjang
        document.getElementById('btnBatal').addEventListener('click', function() {
            if(confirm('Yakin ingin membatalkan transaksi ini?')) {
                cart = [];
                inputBayar.value = '';
                updateCart();
            }
        });

        // Logic Rendering JS Cart
        window.plusQty = function(id) {
            const ix = cart.findIndex(i => i.id === String(id));
            if(ix !== -1) {
                if (cart[ix].qty >= cart[ix].stok) { alert('Melebihi batas stok gudang!'); return; }
                cart[ix].qty++;
                updateCart();
            }
        };

        window.minusQty = function(id) {
            const ix = cart.findIndex(i => i.id === String(id));
            if(ix !== -1) {
                cart[ix].qty--;
                if(cart[ix].qty <= 0) cart.splice(ix, 1);
                updateCart();
            }
        };

        function formatRp(angka) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(angka);
        }

        function updateCart() {
            let total = 0;
            if (cart.length === 0) {
                cartList.innerHTML = `
                    <div class="flex flex-col items-center justify-center h-full text-slate-500 opacity-50 space-y-3 p-4 text-center">
                        <i class="ph-fill ph-basket text-6xl"></i>
                        <p class="font-medium">Belum ada barang dipilih. Klik barang di sebelah kiri atau scan barcode.</p>
                    </div>`;
                btnBayar.classList.add('opacity-50', 'cursor-not-allowed');
            } else {
                let html = '';
                cart.forEach(item => {
                    const sub = item.harga * item.qty;
                    total += sub;
                    html += `
                        <div class="flex items-center p-2.5 bg-slate-800/80 rounded-xl mb-2 border border-slate-700 shadow-sm flex-shrink-0 relative group/item transition-colors hover:bg-slate-700/80">
                            <div class="w-12 h-12 bg-white rounded-lg flex-shrink-0 mr-3 flex items-center justify-center p-1 shadow-inner relative z-10">
                                ` + (item.gambar ? `<img src="${item.gambar}" class="w-full h-full object-contain drop-shadow-sm">` : `<i class="ph-fill ph-package text-2xl text-slate-300"></i>`) + `
                            </div>
                            <div class="flex-1 pr-1 overflow-hidden">
                                <h4 class="font-bold text-sm text-white truncate">${item.nama}</h4>
                                <p class="text-indigo-400 font-extrabold text-xs mt-0.5">${formatRp(item.harga)}</p>
                            </div>
                            <div class="flex items-center space-x-1.5 bg-slate-900/80 rounded-lg p-1 border border-slate-700 flex-shrink-0 relative z-10">
                                <button onclick="minusQty(${item.id})" title="Kurangi 1 Item" class="w-7 h-7 flex items-center justify-center rounded bg-slate-800 text-rose-400 hover:text-white hover:bg-rose-500 transition shadow-sm border border-slate-700 hover:border-rose-400"><i class="ph-bold ph-minus"></i></button>
                                <span class="font-bold w-5 text-center text-sm">${item.qty}</span>
                                <button onclick="plusQty(${item.id})" title="Tambah 1 Item" class="w-7 h-7 flex items-center justify-center rounded bg-slate-800 text-emerald-400 hover:text-white hover:bg-emerald-500 transition shadow-sm border border-slate-700 hover:border-emerald-400"><i class="ph-bold ph-plus"></i></button>
                            </div>
                        </div>
                    `;
                });
                cartList.innerHTML = html;
                btnBayar.classList.remove('opacity-50', 'cursor-not-allowed');
            }
            
            txtSubtotal.innerText = formatRp(total);
            txtTotal.innerText = formatRp(total);
            // Simpan state global 
            window.cartTotal = total;

            // Hapus auto-fill e-wallet karena murni tunai
            checkPembayaran(total);
        }

        const bayarContainer = document.getElementById('bayarContainer');

        inputBayar.addEventListener('input', function(e) {
            // Format angka dengan pemisah ribuan (titik)
            let val = this.value.replace(/[^0-9]/g, '');
            this.value = val.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            checkPembayaran(window.cartTotal || 0);
        });

        function getBayar() {
            return parseFloat(inputBayar.value.replace(/\./g, '')) || 0;
        }

        function checkPembayaran(total) {
            const b = getBayar();
            if(cart.length > 0 && b >= total && total > 0) {
                btnBayar.classList.remove('opacity-50', 'cursor-not-allowed');
            } else {
                if(!btnBayar.classList.contains('opacity-50')) {
                    btnBayar.classList.add('opacity-50', 'cursor-not-allowed');
                }
            }
        }

        // Proses Bayar via AJAX Fetch API
        btnBayar.addEventListener('click', function() {
            if(cart.length === 0) return alert('Keranjang masih kosong!');
            const total = window.cartTotal;
            const bayar = getBayar();
            const metode = 'Tunai';

            if(bayar < total) return alert('Uang bayar konsumen kurang!');
            
            const btnOriginalText = btnBayar.innerHTML;
            btnBayar.innerHTML = '<i class="ph-bold ph-spinner animate-spin mr-2"></i> Sedang Memproses...';
            btnBayar.disabled = true;

            fetch('<?php echo e(route("pos.checkout")); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({
                    uang_bayar: bayar,
                    metode_pembayaran: metode,
                    items: cart
                })
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    // Munculkan struk/modal sukses
                    const m = document.getElementById('modalSelesai');
                    const mc = document.getElementById('modalSelesaiContent');
                    
                    document.getElementById('mNota').innerText = data.no_nota;
                    document.getElementById('mKembalian').innerText = formatRp(data.kembalian);
                    document.getElementById('btnCetakModal').href = '/toko-kelontong/public/cetak-struk/' + data.transaksi_id;
                    
                    m.classList.remove('hidden');
                    m.classList.add('flex');
                    setTimeout(() => {
                        mc.classList.remove('scale-95', 'opacity-0');
                        mc.classList.add('scale-100', 'opacity-100');
                    }, 10);
                } else {
                    alert('Gagal: ' + data.message);
                    btnBayar.innerHTML = btnOriginalText;
                    btnBayar.disabled = false;
                }
            })
            .catch(err => {
                alert('Terjadi kesalahan koneksi sistem!');
                btnBayar.innerHTML = btnOriginalText;
                btnBayar.disabled = false;
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\toko-kelontong\resources\views/kasir/pos.blade.php ENDPATH**/ ?>