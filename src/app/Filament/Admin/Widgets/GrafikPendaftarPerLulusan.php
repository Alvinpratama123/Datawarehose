<?php

namespace App\Filament\Admin\Widgets;

use App\Models\DimCalonMahasiswa;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class GrafikPendaftarPerLulusan extends ChartWidget
{
    protected static ?string $heading = 'Grafik Pendaftar per Lulusan';

    protected function getData(): array
    {
        $data = DimCalonMahasiswa::select('asal_sekolah', DB::raw('count(*) as total'))
            ->groupBy('asal_sekolah')
            ->get();

        return [
            'labels' => $data->pluck('asal_sekolah')->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah Pendaftar',
                    'data' => $data->pluck('total')->toArray(),
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
