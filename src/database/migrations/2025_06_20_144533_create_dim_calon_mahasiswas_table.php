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
        Schema::create('dim_calon_mahasiswas', function (Blueprint $table) {
            $table->id('id_calon_mahasiswa');
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->integer('usia')->nullable();
            $table->string('pendidikan_terakhir');
            $table->string('asal_sekolah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dim_calon_mahasiswas', function (Blueprint $table) {
            $table->dropColumn('usia');
        });
    }
};
