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
        Schema::create('a_tahunans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tahunan_id')->constrained('p_tahunans')->onDelete('cascade');
            $table->foreignId('transaksi_id')->constrained('transaksi')->onDelete('cascade')->nullable();
            $table->string('nama');
            $table->integer('nominal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_tahunans');
    }
};
