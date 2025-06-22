<?php

namespace App\Filament\Admin\Widgets;

use App\Models\FaktaPendaftaranPMB;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\ChartWidget;

class GrafikPendaftarPerJalur extends ChartWidget
{
    protected static ?string $heading = 'Grafik Pendaftar Per Jalur';

    protected function getData(): array
    {
        $data = FaktaPendaftaranPMB::select('id_jalur_masuk', DB::raw('count(*) as total'))
            ->groupBy('id_jalur_masuk')
            ->with('jalurMasuk') // relasi dari model FaktaPendaftaranPMB
            ->get();

        return [
            'labels' => $data->pluck('jalurMasuk.nama_jalur')->toArray(),
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
