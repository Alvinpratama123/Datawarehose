<?php

namespace App\Filament\Admin\Resources\DimJalurMasukResource\Pages;

use App\Filament\Admin\Resources\DimJalurMasukResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDimJalurMasuk extends EditRecord
{
    protected static string $resource = DimJalurMasukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
