<?php

namespace App\Filament\Admin\Widgets;

use App\Models\FaktaPendaftaranPMB;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\ChartWidget;

class GrafikStatusSeleksi extends ChartWidget
{
    protected static ?string $heading = 'Grafik Status Seleksi';

    protected function getData(): array
    {
        $data = FaktaPendaftaranPMB::select('status_seleksi', DB::raw('count(*) as total'))
            ->groupBy('status_seleksi')
            ->get();

        return [
            'labels' => $data->pluck('status_seleksi')->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah',
                    'data' => $data->pluck('total')->toArray(),
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
