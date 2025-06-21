<?php

namespace App\Filament\Admin\Resources\DimWaktuResource\Pages;

use App\Filament\Admin\Resources\DimWaktuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDimWaktu extends EditRecord
{
    protected static string $resource = DimWaktuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
