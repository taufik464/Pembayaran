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
        Schema::create('data_ppdb', function (Blueprint $table) {
            $table->id();
            // Halaman 1: Data Pribadi
            $table->string('nama');
            $table->string('nik', 16)->unique(); // NIK biasanya 16 digit
            $table->string('nisn', 10)->unique(); // NISN biasanya 10 digit
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->date('tgl_lahir');
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']);
            $table->text('alamat');
            $table->string('no_hp', 20);
            $table->string('asal_sekolah');

            // Halaman 2: Bakat dan Minat
            $table->string('hobi');
            $table->string('bidang_studi');
            $table->string('olahraga');
            $table->string('cita_cita');
            // Halaman 3: Orang Tua/Wali
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('penghasilan_ayah');
            $table->enum('keterangan_ayah', ['Hidup', 'Meninggal']);
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('penghasilan_ibu');
            $table->enum('keterangan_ibu', ['Hidup', 'Meninggal']);
            $table->string('nama_wali');
            $table->string('pekerjaan_wali');
            $table->string('penghasilan_wali');
            $table->text('alamat_wali');

            // Halaman 4: Upload Berkas
            $table->string('skl_path')->nullable(); // Path ke file foto
            $table->string('kk_path')->nullable(); // Path ke file KK
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_ppdb');
    }
};
