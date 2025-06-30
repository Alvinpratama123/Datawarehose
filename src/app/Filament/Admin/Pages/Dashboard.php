<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Admin\Widgets\GrafikPendaftarPerJalur;
use App\Filament\Admin\Widgets\GrafikJumlahBayarPerProdi;
use App\Filament\Admin\Widgets\GrafikStatusSeleksi;
use App\Filament\Admin\Widgets\GrafikStatusBayar;

class Dashboard extends BaseDashboard
{
    protected function getHeaderWidgets(): array
    {
        return [
            GrafikPendaftarPerJalur::class,
            GrafikJumlahBayarPerProdi::class,
            GrafikStatusSeleksi::class,
            GrafikStatusBayar::class,
        ];
    }
}
