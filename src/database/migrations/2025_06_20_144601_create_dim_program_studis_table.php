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
        Schema::create('dim_program_studis', function (Blueprint $table) {
            $table->id('id_program_studi');
            $table->string('nama_prodi');
            $table->string('fakultas');
            $table->string('jenjang_pendidikan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dim_program_studis');
    }
};
