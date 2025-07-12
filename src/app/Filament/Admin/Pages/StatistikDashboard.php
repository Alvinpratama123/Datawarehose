<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Page;
use App\Filament\Admin\Widgets\GrafikPendaftarPerJalur;
use App\Filament\Admin\Widgets\GrafikJumlahBayarPerProdi;
use App\Filament\Admin\Widgets\GrafikStatusSeleksi;
use App\Filament\Admin\Widgets\GrafikStatusBayar;
use App\Filament\Admin\Widgets\GrafikGenderPendaftar;
use App\Filament\Admin\Widgets\GrafikLulusanPendaftar;
use App\Filament\Admin\Widgets\GrafikPendaftarPerProvinsi;
use App\Filament\Admin\Widgets\GrafikPendaftarPerGender;
use App\Filament\Admin\Widgets\GrafikPendaftarPerLulusan;




class StatistikDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static string $view = 'filament.admin.pages.statistik-dashboard';

    protected function getHeaderWidgets(): array
    {
        return [
            GrafikPendaftarPerJalur::class,
            GrafikJumlahBayarPerProdi::class,
            GrafikStatusSeleksi::class,
            GrafikStatusBayar::class,
            GrafikPendaftarPerGender::class,
            GrafikPendaftarPerLulusan::class,
            GrafikPendaftarPerProvinsi::class,

        ];
    }
}
