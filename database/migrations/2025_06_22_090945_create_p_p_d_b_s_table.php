<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ppdb', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->string('judul');
            $table->text('konten');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->date('tanggal_pengumuman');
            $table->date('tanggal_daftar_ulang');
            $table->text('persyaratan');
            $table->decimal('biaya', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ppdb');
    }
};
