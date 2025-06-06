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
        Schema::create('p_tambahan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembayaran_lain_id')->constrained('pembayaran_lain')->onDelete('cascade');
            $table->foreignId('siswa_id')->constrained('siswa', 'nis')->onDelete('cascade');
            $table->foreignId('transaksi_id')->constrained('transaksi')->onDelete('cascade')->nullable();
         
            $table->decimal('harga', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_tahunan');
    }
};
