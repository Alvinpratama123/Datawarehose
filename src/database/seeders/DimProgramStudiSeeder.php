<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DimProgramStudi;

class DimProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
$prodi = ['TI', 'SI', 'Manajemen', 'Akuntansi', 'Hukum'];
$fakultas = ['FTI', 'FEB', 'FH'];
for ($i = 1; $i <= 10; $i++) {
DimProgramStudi::create([
'nama_prodi' => $prodi[$i % 5],
'fakultas' => $fakultas[$i % 3],
'jenjang_pendidikan' => 'S1',
]);
}
}
}
