<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Pastikan role 'super_admin' ada
        Role::firstOrCreate(['name' => 'super_admin']);
    
        // Buat atau update 1 user admin
        $user = User::updateOrCreate(
            ['email' => 'admin@admin.com'], // cari berdasarkan email
            [
                'name' => 'Admin',
                'password' => bcrypt('password'), // password default
            ]
        );
    
        // Assign role super_admin ke user tersebut
        $user->assignRole('super_admin');
    
        // Jalankan seeder untuk semua tabel dimensi
        $this->call([
            DimCalonMahasiswaSeeder::class,
            DimProgramStudiSeeder::class,
            DimJalurMasukSeeder::class,
            DimLokasiSeeder::class,
            DimWaktuSeeder::class,
            FaktaPendaftaranPMBSeeder::class,
        ]);
    }
    
}
