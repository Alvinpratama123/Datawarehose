<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DimJalurMasuk;

class DimJalurMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
$jalur = ['SNBP', 'SNBT', 'Mandiri'];
for ($i = 1; $i <= 10; $i++) {
DimJalurMasuk::create([
'nama_jalur' => $jalur[$i % 3],
'tipe_jalur' => 'Tipe-' . $i,
]);
}
}
}
