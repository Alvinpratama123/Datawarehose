<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DimJalurMasuk;

class DimJalurMasukSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('dim_jalur_masuks')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $jalur = ['SNBP', 'SNBT', 'Mandiri'];

        for ($i = 1; $i <= 10; $i++) {
            DimJalurMasuk::create([
                'nama_jalur' => $jalur[$i % 3],
                'tipe_jalur' => 'Tipe-' . $i,
            ]);
        }
    }
}
