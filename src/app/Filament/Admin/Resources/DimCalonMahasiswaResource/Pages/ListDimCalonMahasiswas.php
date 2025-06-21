<?php

namespace App\Filament\Admin\Resources\DimCalonMahasiswaResource\Pages;

use App\Filament\Admin\Resources\DimCalonMahasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDimCalonMahasiswas extends ListRecords
{
    protected static string $resource = DimCalonMahasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
