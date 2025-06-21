<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;

class GrafikPendaftarPerJalur extends ChartWidget
{
    protected static ?string $heading = 'Grafik Pendaftar Per Jalur';

    protected function getData(): array
    {
        return [
            'labels' => ['Reguler', 'Mandiri'],
            'datasets' => [
                [
                    'label' => 'Jumlah Pendaftar',
                    'data' => [30, 20],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
