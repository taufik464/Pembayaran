<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ekstrakurikulers', function (Blueprint $table) {  // Nama tabel singular
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('gambar');
            $table->string('pembina');
            $table->string('jadwal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ekstrakurikuler');  // Konsisten dengan nama di up()
    }
};
