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
        Schema::create('fakta_pendaftaran_p_m_b_s', function (Blueprint $table) {
            $table->id('id_fakta'); // ⬅️ Primary key untuk fakta
            $table->unsignedBigInteger('id_calon_mahasiswa');
            $table->unsignedBigInteger('id_program_studi');
            $table->unsignedBigInteger('id_jalur_masuk');
            $table->unsignedBigInteger('id_lokasi');
            $table->unsignedBigInteger('id_waktu');

            $table->string('status_bayar');
            $table->string('status_seleksi');
            $table->decimal('jumlah_bayar', 10, 2);

            // Foreign Keys
            $table->foreign('id_calon_mahasiswa')->references('id_calon_mahasiswa')->on('dim_calon_mahasiswas');
            $table->foreign('id_program_studi')->references('id_program_studi')->on('dim_program_studis');
            $table->foreign('id_jalur_masuk')->references('id_jalur_masuk')->on('dim_jalur_masuks');
            $table->foreign('id_lokasi')->references('id_lokasi')->on('dim_lokasis');
            $table->foreign('id_waktu')->references('id_waktu')->on('dim_waktus');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fakta_pendaftaran_p_m_b_s');
    }
};
