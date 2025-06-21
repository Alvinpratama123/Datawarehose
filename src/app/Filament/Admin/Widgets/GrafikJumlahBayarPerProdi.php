<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;

class GrafikJumlahBayarPerProdi extends ChartWidget
{
    protected static ?string $heading = 'Grafik Jumlah Bayar Per Prodi';

    protected function getData(): array
    {
        return [
            'labels' => ['Prodi A', 'Prodi B'],
            'datasets' => [
                ['label' => 'Jumlah Bayar', 'data' => [5000000, 7000000]],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}


