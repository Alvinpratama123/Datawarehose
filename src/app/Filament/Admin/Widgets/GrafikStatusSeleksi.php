<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;

class GrafikStatusSeleksi extends ChartWidget
{
    protected static ?string $heading = 'Grafik Status Seleksi';

    protected function getData(): array
    {
        return [
            'labels' => ['Lulus', 'Tidak Lulus'],
            'datasets' => [
                [
                    'label' => 'Jumlah',
                    'data' => [15, 5], // dummy
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
