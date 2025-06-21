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
        Schema::create('dim_jalur_masuks', function (Blueprint $table) {
            $table->id('id_jalur_masuk');
            $table->string('nama_jalur');
            $table->string('tipe_jalur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dim_jalur_masuks');
    }
};
