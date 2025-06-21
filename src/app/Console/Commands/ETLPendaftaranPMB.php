<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DimWaktu;
use App\Models\DimLokasi;
use App\Models\DimJalurMasuk;
use App\Models\DimCalonMahasiswa;
use App\Models\DimProgramStudi;
use App\Models\FaktaPendaftaranPMB;

class ETLPendaftaranPMB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * Jalankan pakai: php artisan etl:pmb
     */
    protected $signature = 'etl:pmb';

    /**
     * The console command description.
     */
    protected $description = 'Proses ETL dari data dimensi ke tabel fakta_pendaftaran_pmb';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Proses ETL untuk memasukkan 10 data dummy ke tabel fakta_pendaftaran_pmb
        for ($i = 0; $i < 10; $i++) {
            FaktaPendaftaranPMB::create([
                'id_waktu' => DimWaktu::inRandomOrder()->first()->id_waktu,
                'id_lokasi' => DimLokasi::inRandomOrder()->first()->id_lokasi,
                'id_jalur_masuk' => DimJalurMasuk::inRandomOrder()->first()->id_jalur_masuk,
                'id_calon_mahasiswa' => DimCalonMahasiswa::inRandomOrder()->first()->id_calon_mahasiswa,
                'id_program_studi' => DimProgramStudi::inRandomOrder()->first()->id_program_studi,
                'status_bayar' => ['Lunas', 'Belum Lunas'][rand(0, 1)],
                'status_seleksi' => ['Lulus', 'Tidak Lulus'][rand(0, 1)],
                'jumlah_bayar' => rand(1000000, 5000000),
            ]);
        }

        $this->info(' Proses ETL selesai! 10 data telah dimasukkan ke tabel fakta_pendaftaran_pmb.');
    }
}
