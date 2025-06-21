<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;

class GrafikStatusBayar extends ChartWidget
{
    protected static ?string $heading = 'Grafik Status Bayar';

    protected function getData(): array
    {
        return [
            'labels' => ['Sudah Bayar', 'Belum Bayar'],
            'datasets' => [
                [
                    'label' => 'Jumlah',
                    'data' => [5, 3], // dummy data
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie'; // bisa 'bar', 'line', dll
    }
}
