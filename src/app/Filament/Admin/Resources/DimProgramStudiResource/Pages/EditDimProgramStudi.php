<?php

namespace App\Filament\Admin\Resources\DimProgramStudiResource\Pages;

use App\Filament\Admin\Resources\DimProgramStudiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDimProgramStudi extends EditRecord
{
    protected static string $resource = DimProgramStudiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
