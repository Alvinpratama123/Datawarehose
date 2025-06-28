<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DimProgramStudi;

class DimProgramStudiSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('dim_program_studis')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i = 1; $i <= 10; $i++) {
            DimProgramStudi::create([
                'nama_prodi' => 'Prodi ' . $i,
                'fakultas' => 'Fakultas ' . $i,
                'jenjang_pendidikan' => 'S1',
            ]);
        }
    }
}
