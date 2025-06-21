<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DimCalonMahasiswa;

class DimCalonMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
$gender = ['Laki-laki', 'Perempuan'];
for ($i = 1; $i <= 10; $i++) {
DimCalonMahasiswa::create([
'nama_lengkap' => 'Mahasiswa-' . $i,
'jenis_kelamin' => $gender[$i % 2],
'tanggal_lahir' => now()->subYears(18 + $i),
'usia' => 18 + $i,
'pendidikan_terakhir' => 'SMA',
]);
}
}
}
