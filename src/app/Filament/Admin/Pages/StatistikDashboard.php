<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Page;
use App\Filament\Admin\Widgets\GrafikPendaftarPerJalur;
use App\Filament\Admin\Widgets\GrafikJumlahBayarPerProdi;
use App\Filament\Admin\Widgets\GrafikStatusSeleksi;
use App\Filament\Admin\Widgets\GrafikStatusBayar;

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
        ];
    }
}
