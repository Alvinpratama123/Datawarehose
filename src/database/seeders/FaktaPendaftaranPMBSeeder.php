<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\FaktaPendaftaranPMB;
use App\Models\DimCalonMahasiswa;
use App\Models\DimProgramStudi;
use App\Models\DimJalurMasuk;
use App\Models\DimLokasi;
use App\Models\DimWaktu;

class FaktaPendaftaranPMBSeeder extends Seeder
{
    public function run(): void
    {
        // Kosongkan tabel fakta terlebih dahulu
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('fakta_pendaftaran_p_m_b_s')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Buat 10 data sesuai dengan ID 1–10
        for ($i = 1; $i <= 10; $i++) {
            FaktaPendaftaranPMB::create([
                'id_calon_mahasiswa' => $i,
                'id_program_studi'   => $i,
                'id_jalur_masuk'     => $i,
                'id_lokasi'          => $i,
                'id_waktu'           => $i,
                'status_bayar'       => 'Lunas',
                'status_seleksi'     => 'Lolos',
                'jumlah_bayar'       => 210000,
            ]);
        }
    }
}
