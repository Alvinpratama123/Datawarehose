<?php

namespace App\Filament\Admin\Widgets;

use App\Models\FaktaPendaftaranPMB;
use Filament\Widgets\ChartWidget;

class GrafikPendaftarPerJalur extends ChartWidget
{
    protected static ?string $heading = 'Grafik Pendaftar Per Jalur';

    protected function getData(): array
    {
        $data = FaktaPendaftaranPMB::with('jalurMasuk')
            ->get()
            ->groupBy('jalurMasuk.nama_jalur')
            ->map(fn ($item) => $item->count());

        return [
            'labels' => $data->keys()->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah Pendaftar',
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
