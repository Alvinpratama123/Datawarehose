<?php

namespace App\Filament\Admin\Widgets;

use App\Models\FaktaPendaftaranPMB;
use Filament\Widgets\ChartWidget;

class GrafikJumlahBayarPerProdi extends ChartWidget
{
    protected static ?string $heading = 'Grafik Jumlah Bayar Per Prodi';

    protected function getData(): array
    {
        $data = FaktaPendaftaranPMB::with('programStudi')
            ->get()
            ->groupBy('programStudi.nama_prodi')
            ->map(function ($item) {
                return $item->sum('jumlah_bayar');
            });

        return [
            'labels' => $data->keys()->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah Bayar',
                    'data' => $data->values()->toArray(),
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
