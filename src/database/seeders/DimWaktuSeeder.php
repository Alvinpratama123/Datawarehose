<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DimWaktu;

class DimWaktuSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('dim_waktus')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i = 1; $i <= 10; $i++) {
            DimWaktu::create([
                'tanggal' => now()->subDays(10 - $i)->toDateString(),
                'hari' => 'Senin',
                'bulan' => 'Juni',
                'tahun' => '2025',
                'periode_pendaftaran' => 'Gelombang ' . $i,
            ]);
        }
    }
}
