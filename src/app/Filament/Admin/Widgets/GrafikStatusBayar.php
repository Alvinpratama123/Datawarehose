<?php

namespace App\Filament\Admin\Widgets;

use App\Models\FaktaPendaftaranPMB;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\ChartWidget;

class GrafikStatusBayar extends ChartWidget
{
    protected static ?string $heading = 'Grafik Status Bayar';

    protected function getData(): array
    {
        $data = FaktaPendaftaranPMB::select('status_bayar', DB::raw('count(*) as total'))
            ->groupBy('status_bayar')
            ->get();

        return [
            'labels' => $data->pluck('status_bayar')->toArray(),
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
        return 'pie'; // Atau bar, line sesuai kebutuhan
    }
}
