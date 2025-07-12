<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Admin\Widgets\GrafikPendaftarPerJalur;
use App\Filament\Admin\Widgets\GrafikJumlahBayarPerProdi;
use App\Filament\Admin\Widgets\GrafikStatusSeleksi;
use App\Filament\Admin\Widgets\GrafikStatusBayar;
use App\Filament\Admin\Widgets\GrafikPendaftarPerProvinsi;
use App\Filament\Admin\Widgets\GrafikPendaftarPerGender;
use App\Filament\Admin\Widgets\GrafikPendaftarPerLulusan;


class Dashboard extends BaseDashboard
{
    protected function getHeaderWidgets(): array
    {
        return [
            GrafikPendaftarPerJalur::class,
            GrafikJumlahBayarPerProdi::class,
            GrafikStatusSeleksi::class,
            GrafikStatusBayar::class,
            GrafikPendaftarPerProvinsi::class,
            GrafikPendaftarPerGender::class,
            GrafikPendaftarPerLulusan::class,
        ];
    }
}
