<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengaturans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_toko')->default('Toko Kelontong');
            $table->text('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->text('catatan_struk')->nullable();
            $table->timestamps();
        });

        // Seed data awal
        \Illuminate\Support\Facades\DB::table('pengaturans')->insert([
            'nama_toko' => 'Toko Kelontong',
            'alamat' => 'Jl. Pahlawan No. 1, Pusat Kota',
            'telepon' => '0812-3456-7890',
            'catatan_struk' => 'Terima kasih telah berbelanja! Barang yang sudah dibeli tidak dapat ditukar atau dikembalikan.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaturans');
    }
};
