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
            $table->id('id_fakta');
            $table->foreignId('id_waktu')->constrained('dim_waktus', 'id_waktu');
            $table->foreignId('id_lokasi')->constrained('dim_lokasis', 'id_lokasi');           
            $table->foreignId('id_jalur_masuk')->constrained('dim_jalur_masuks', 'id_jalur_masuk');
            $table->foreignId('id_calon_mahasiswa')->constrained('dim_calon_mahasiswas', 'id_calon_mahasiswa');
            $table->foreignId('id_program_studi')->constrained('dim_program_studis', 'id_program_studi');
            $table->string('status_bayar');
            $table->string('status_seleksi');
            $table->decimal('jumlah_bayar', 10, 2);
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
