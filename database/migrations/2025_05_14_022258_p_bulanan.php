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
        Schema::create('p_bulanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa', 'nis')->onDelete('cascade');
            $table->foreignId('jenis_pembayaran_id')->constrained('jenis_pembayarans',)->onDelete('cascade');
            $table->foreignId('bulan_id')->constrained('bulan',)->onDelete('cascade');
            $table->foreignId('transaksi_id')->nullable()->constrained('transaksi',)->onDelete('set null');

            $table->integer('harga')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_bulanan');
    }
};
