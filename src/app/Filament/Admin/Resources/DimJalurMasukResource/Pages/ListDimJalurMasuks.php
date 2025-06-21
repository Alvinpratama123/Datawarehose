<?php

namespace App\Filament\Admin\Resources\DimJalurMasukResource\Pages;

use App\Filament\Admin\Resources\DimJalurMasukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDimJalurMasuks extends ListRecords
{
    protected static string $resource = DimJalurMasukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
