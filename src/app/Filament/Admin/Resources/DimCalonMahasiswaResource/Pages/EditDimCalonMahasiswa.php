<?php

namespace App\Filament\Admin\Resources\DimCalonMahasiswaResource\Pages;

use App\Filament\Admin\Resources\DimCalonMahasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDimCalonMahasiswa extends EditRecord
{
    protected static string $resource = DimCalonMahasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
