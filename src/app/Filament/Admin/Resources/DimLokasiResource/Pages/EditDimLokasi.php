<?php

namespace App\Filament\Admin\Resources\DimLokasiResource\Pages;

use App\Filament\Admin\Resources\DimLokasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDimLokasi extends EditRecord
{
    protected static string $resource = DimLokasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
