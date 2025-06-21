<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DimLokasi;

class DimLokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
$provinsi = ['Jawa Barat', 'Jawa Tengah', 'Jawa Timur', 'DKI Jakarta', 'Banten'];
for ($i = 1; $i <= 10; $i++) {
DimLokasi::create([
'provinsi' => $provinsi[$i % 5],
'kota_kabupaten' => 'Kota-' . $i,
]);
}
}
}
