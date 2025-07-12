<?php

namespace App\Filament\Admin\Widgets;

use App\Models\DimCalonMahasiswa;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class GrafikPendaftarPerGender extends ChartWidget
{
    protected static ?string $heading = 'Grafik Pendaftar per Gender';

    protected function getData(): array
    {
        $data = DimCalonMahasiswa::select('jenis_kelamin', DB::raw('count(*) as total'))
            ->groupBy('jenis_kelamin')
            ->get();

        return [
            'labels' => $data->pluck('jenis_kelamin')->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah Pendaftar',
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => ['#f87171', '#60a5fa'], // warna untuk laki & perempuan
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
