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
        Schema::create('dim_waktus', function (Blueprint $table) {
            $table->id('id_waktu');
            $table->date('tanggal');
            $table->string('hari');
            $table->string('bulan');
            $table->string('tahun');
            $table->string('periode_pendaftaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dim_waktus');
    }
};
