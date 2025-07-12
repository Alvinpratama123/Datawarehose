<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DimCalonMahasiswa;

class DimCalonMahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('dim_calon_mahasiswas')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i = 1; $i <= 10; $i++) {
            DimCalonMahasiswa::create([
                'nama_lengkap' => 'Mahasiswa ' . $i,
                'jenis_kelamin' => $i % 2 == 0 ? 'Laki-laki' : 'Perempuan',
                'tanggal_lahir' => now()->subYears(18 + $i)->toDateString(),
                'usia' => 18 + $i,
                'pendidikan_terakhir' => $i % 2 == 0 ? 'SMK' : 'SMA',
                'asal_sekolah' => $i % 2 == 0 ? 'SMKN 1 Kota ' . $i : 'SMAN 2 Kota ' . $i,
            ]);
        }
    }
}
