<?php

namespace App\Filament\Admin\Widgets;

use App\Models\FaktaPendaftaranPMB;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\ChartWidget;

class GrafikJumlahBayarPerProdi extends ChartWidget
{
    protected static ?string $heading = 'Grafik Jumlah Bayar Per Prodi';

    protected function getData(): array
    {
        $data = FaktaPendaftaranPMB::select('id_program_studi', DB::raw('SUM(jumlah_bayar) as total_bayar'))
            ->groupBy('id_program_studi')
            ->with('programStudi') // relasi dari model FaktaPendaftaranPMB
            ->get();

        return [
            'labels' => $data->pluck('programStudi.nama_prodi')->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah Bayar',
                    'data' => $data->pluck('total_bayar')->toArray(),
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
