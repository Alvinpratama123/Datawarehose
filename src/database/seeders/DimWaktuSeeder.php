<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DimWaktu;

class DimWaktuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
for ($i = 1; $i <= 10; $i++) {
DimWaktu::create([
'tanggal' => now()->subDays($i),
'hari' => 'Hari-' . $i,
'bulan' => 'Bulan-' . ceil($i/2),
'tahun' => '202' . ($i % 5),
'periode_pendaftaran' => 'Gelombang ' . ($i % 3 + 1),
]);
}
}
}
