<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DimLokasi;

class DimLokasiSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('dim_lokasis')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i = 1; $i <= 10; $i++) {
            DimLokasi::create([
                'provinsi' => 'Provinsi ' . $i,
                'kota_kabupaten' => 'Kota ' . $i,
            ]);
        }
    }
}
