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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('no_nota')->unique();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Kasir who made it
            $table->decimal('total_harga', 15, 2);
            $table->decimal('uang_bayar', 15, 2);
            $table->decimal('kembalian', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
