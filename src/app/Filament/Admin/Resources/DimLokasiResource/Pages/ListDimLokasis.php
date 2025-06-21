<?php

namespace App\Filament\Admin\Resources\DimLokasiResource\Pages;

use App\Filament\Admin\Resources\DimLokasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDimLokasis extends ListRecords
{
    protected static string $resource = DimLokasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
