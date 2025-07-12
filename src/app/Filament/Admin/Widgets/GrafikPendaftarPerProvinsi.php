<?php

namespace App\Filament\Admin\Widgets;

use App\Models\FaktaPendaftaranPMB;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\ChartWidget;

class GrafikPendaftarPerProvinsi extends ChartWidget
{
    protected static ?string $heading = 'Grafik Pendaftar per Provinsi';

    protected function getData(): array
    {
        $data = FaktaPendaftaranPMB::join('dim_lokasis', 'fakta_pendaftaran_p_m_b_s.id_lokasi', '=', 'dim_lokasis.id_lokasi')
            ->select('dim_lokasis.provinsi', DB::raw('count(*) as total'))
            ->groupBy('dim_lokasis.provinsi')
            ->get();

        return [
            'labels' => $data->pluck('provinsi')->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah Pendaftar',
                    'data' => $data->pluck('total')->toArray(),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.7)',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
